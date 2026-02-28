<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class OrderItemModel extends Model
{
    use HasFactory;

    protected $table = 'orders_item';

    /**
     * Get product for order item
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function getProduct()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    /**
     * Get review for product
     * @param $product_id
     * @param $order_id
     * @return mixed
     */
    public static function getReview($product_id, $order_id)
    {
       return ProductReviewModel::getReview($product_id, $order_id, Auth::user()->id);
           
    }
}
