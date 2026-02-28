<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model
{
    use HasFactory;

    protected $table = 'product_size';
    protected $fillable = ['id','product_id','name','price','created_at'];

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function DeleteRecord($product_id)
    {
self::where('product_id','=',$product_id)->delete();    }
}
