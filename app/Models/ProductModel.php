<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductWishlistModel;


class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'title',
        'slug',
        'sku',
        'category_id',
        'sub_category_id',
        'brand_id',
        'old_price',
        'price',
        'short_description',
        'description',
        'additional_information',
        'shipping_returns',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function colors()
    {
        return $this->hasMany(ProductColorModel::class, 'product_id');
    }

    // Связь с таблицей product_size
    public function sizes()
    {
        return $this->hasMany(ProductSizeModel::class, 'product_id');
    }

    // Связь с таблицей product_image
    public function images()
    {
        return $this->hasMany(ProductImageModel::class, 'product_id');
    }


    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('product.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'product.created_by')
            ->where('product.is_delete', '=', 0)
            ->orderBy('product.id', 'desc')
            ->paginate(30);
    }

    static public function getMyWishlist($user_id)
    {
        $return = ProductModel::select(
            'product.*',
            'users.name as created_by_name',
            'category.name as category_name',
            'category.slug as category_slug',
            'sub_category.name as sub_category_name',
            'sub_category.slug as sub_category_slug'
        )
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
            ->join('product_wishlist', 'product_wishlist.product_id', '=', 'product.id')
            ->where('product_wishlist.user_id', '=', $user_id)
            ->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            ->groupBy('product.id')
            ->orderBy('product.id', 'desc')
            ->paginate(30);

        return $return;
    }

    static public function getRecentArrival()
    {
        $return = ProductModel::select(
            'product.*',
            'users.name as created_by_name',
            'category.name as category_name',
            'category.slug as category_slug',
            'sub_category.name as sub_category_name',
            'sub_category.slug as sub_category_slug'
        )
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
            ->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0);
            if(!empty(request()->get('category_id')))
            {
                $return = $return->where('product.category_id', '=', Request::get('category_id'));
            }
        $return = $return->groupBy('product.id')
            ->orderBy('product.id', 'desc')
            ->limit(8)
            ->get();

        return $return;
    }

    static public function getProductTrendy()
    {
        $return = ProductModel::select(
            'product.*',
            'users.name as created_by_name',
            'category.name as category_name',
            'category.slug as category_slug',
            'sub_category.name as sub_category_name',
            'sub_category.slug as sub_category_slug'
        )
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
            ->where('product.is_delete', '=', 0)
            ->where('product.is_trendy', '=', 1)
            ->where('product.status', '=', 0);
           
        $return = $return->groupBy('product.id')
            ->orderBy('product.id', 'desc')
            ->limit(20)
            ->get();

        return $return;
    }

  

   static public function getProduct($request = null, $category_id = '', $subcategory_id = '')
{
    $return = self::select(
        'product.*',
        'users.name as created_by_name',
        'category.name as category_name',
        'category.slug as category_slug',
        'sub_category.name as sub_category_name',
        'sub_category.slug as sub_category_slug'
    )
    ->join('users', 'users.id', '=', 'product.created_by')
    ->join('category', 'category.id', '=', 'product.category_id')
    ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id');

    // =========================
    // CATEGORY FILTER
    // =========================
    if (!empty($category_id)) {
        $return->where('product.category_id', $category_id);
    }

    if (!empty($subcategory_id)) {
        $return->where('product.sub_category_id', $subcategory_id);
    }

    // =========================
    // SUB CATEGORY FILTER (multi)
    // =========================
    if (!empty($request->sub_category_id)) {
        $ids = rtrim($request->sub_category_id, ',');
        $return->whereIn('product.sub_category_id', explode(',', $ids));
    }

    // fallback старої логіки
    if (empty($request->sub_category_id)) {
        if (!empty($request->old_category_id)) {
            $return->where('product.category_id', $request->old_category_id);
        }
        if (!empty($request->old_sub_category_id)) {
            $return->where('product.sub_category_id', $request->old_sub_category_id);
        }
    }

    // =========================
    // COLOR FILTER
    // =========================
    if (!empty($request->color_id)) {
        $ids = rtrim($request->color_id, ',');
        $return->join('product_color', 'product_color.product_id', '=', 'product.id')
               ->whereIn('product_color.color_id', explode(',', $ids));
    }

    // =========================
    // BRAND FILTER
    // =========================
    if (!empty($request->brand_id)) {
        $ids = rtrim($request->brand_id, ',');
        $return->whereIn('product.brand_id', explode(',', $ids));
    }

    // =========================
    // PRICE FILTER
    // =========================
    if (!empty($request->start_price) && !empty($request->end_price)) {
        $start = (int) str_replace('грн', '', $request->start_price);
        $end = (int) str_replace('грн', '', $request->end_price);

        $return->whereBetween('product.price', [$start, $end]);
    }

    // =========================
    // SEARCH
    // =========================
    if (!empty($request->q)) {
        $return->where('product.title', 'like', '%' . $request->q . '%');
    }

    // =========================
    // STATUS FILTER
    // =========================
    $return->where('product.is_delete', 0)
           ->where('product.status', 0)
           ->groupBy('product.id');

    // =========================
    // SORTING (🔥 ГОЛОВНЕ ЩО МИ ДОДАЛИ)
    // =========================
    switch ($request->sortby ?? '') {

        case 'popularity':
            $return->orderBy('product.views', 'desc');
            break;

        case 'rating':
            $return->orderBy('product.rating', 'desc');
            break;

        case 'date':
            $return->orderBy('product.created_at', 'desc');
            break;

        case 'id_asc':
            $return->orderBy('product.id', 'asc');
            break;

        case 'id_desc':
            $return->orderBy('product.id', 'desc');
            break;

        default:
            $return->orderBy('product.id', 'desc');
    }

    return $return->paginate(30);
}

    static public function getRelatedProduct($product_id, $sub_category_id)
    {
        $return = ProductModel::select(
            'product.*',
            'users.name as created_by_name',
            'category.name as category_name',
            'category.slug as category_slug',
            'sub_category.name as sub_category_name',
            'sub_category.slug as sub_category_slug'
        )
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
            ->where('product.id', '!=', $product_id)
            ->where('product.sub_category_id', '=', $sub_category_id)
            ->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            ->groupBy('product.id')
            ->orderBy('product.id', 'desc')
            ->limit(10)
            ->get();

        return $return;
    }

    public function  getImageSingle($product_id)
    {
        return ProductImageModel::where('product_id', '=', $product_id)->orderBy('order_by', 'asc')->first();
    }

    static public function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            ->first();
    }

    static public function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    static public function checkWishlist($product_id)
    {
        return ProductWishlistModel::checkAlready($product_id, Auth::user()->id);
    }

    public function getColor()
    {
        return $this->hasMany(ProductColorModel::class, 'product_id');
    }

    public function getSize()
    {
        return $this->hasMany(ProductSizeModel::class, 'product_id');
    }
    public function getImage()
    {
        return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc');
    }

    public function getCategory()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    public function getSubCategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id');
    }

    public function getTotalReview()
    {
        return $this->hasMany(ProductReviewModel::class, 'product_id')
            ->join('users', 'users.id', 'product_review.user_id')
            ->count();
    }

    static public function getReviewRating($product_id)
    {
        $avg =   ProductReviewModel::getRatingAvg($product_id);

        if ($avg >= 1 && $avg <= 1) {
            return 20;
        } elseif ($avg >= 1 && $avg <= 2) {
            return 40;
        } elseif ($avg >= 1 && $avg <= 3) {
            return 60;
        } elseif ($avg >= 1 && $avg <= 4) {
            return 80;
        } elseif ($avg >= 1 && $avg <= 5) {
            return 100;
        } else {
            return 0;
        }
    }
}
