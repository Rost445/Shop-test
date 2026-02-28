<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;
    protected $table = 'product_image';
    protected $fillable = ['id', 'product_id', 'image_name',    'image_extension',    'order_by', 'created_at'];



    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getLogo()
    {
        if (!empty($this->image_name) && file_exists('upload/product/' . $this->image_name)) {
            return url('upload/product/' . $this->image_name);
        } else {
            return "";
        }
    }
}
