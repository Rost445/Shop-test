<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductWishlistModel extends Model
{
   use HasFactory;
    protected $table = 'product_wishlist';

   
   
   public static function getSingle($id)
   {
    return self::find($id);
   }

   public static function DeleteRecord($product_id, $user_id)
   {
      self::where('product_id','=', $product_id)->where('user_id','=', $user_id)->delete();
   }

   public static function checkAlready($product_id, $user_id)
   {
      return self::where('product_id','=', $product_id)->where('user_id','=', $user_id)->count();
   }

   
   
}