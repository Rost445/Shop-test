<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class ProductReviewModel extends Model
{
    use HasFactory;
    protected $table = 'product_review';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    /* GET ALL REVIEWS */
    public static function getReviews()
    {
        $return =  ProductReviewModel::select('*');
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('order_id'))) {
            $return = $return->where('order_id', '=', Request::get('order_id'));
        }
        if (!empty(Request::get('user_id'))) {
            $return = $return->where('user_id', '=', Request::get('user_id'));
        }
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('from_date'))) {
            $return = $return->whereDate('created_at', '>=', Request::get('from_date'));
        }
        if (!empty(Request::get('to_date'))) {
            $return = $return->whereDate('created_at', '<=', Request::get('to_date'));
        }
        $return = $return->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(30);
        return $return;
    }

    /* GET REVIEWS */
    public static function getReview($product_id, $order_id, $user_id)
    {
        return self::select('*')
            ->where('product_id', $product_id)
            ->where('order_id', $order_id)
            ->where('user_id', $user_id)
            ->first();
    }

    public static function getReviewProduct($product_id)
    {
        return self::select('product_review.*', 'users.name')
            ->join('users', 'users.id', 'product_review.user_id')
            ->where('product_review.product_id', '=', $product_id)
            ->orderBy('product_review.id', 'desc')
            ->paginate(10);
    }

    static public function getRatingAvg($product_id)
    {
        return self::select('product_review.rating')
            ->join('users', 'users.id', 'product_review.user_id')
            ->where('product_review.product_id', '=', $product_id)
            ->avg('product_review.rating');
    }

    public  function getPercent()
    {
        $ratig = $this->rating;

        if ($ratig == 1) {
            return 20;
        } elseif ($ratig == 2) {
            return 40;
        } elseif ($ratig == 3) {
            return 60;
        } elseif ($ratig == 4) {
            return 80;
        } elseif ($ratig == 5) {
            return 100;
        } else {
            return 0;
        }
    }

    public static function getReviewCount($product_id)
    {
        return self::select('product_review.*', 'users.name')
            ->join('users', 'users.id', 'product_review.user_id')
            ->where('product_review.product_id', '=', $product_id)
            ->count();
    }

    // Устанавливаем связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Кастомный атрибут для имени пользователя
    public function getUserNameAttribute()
    {
        return $this->user ? $this->user->name : null;
    }
}
