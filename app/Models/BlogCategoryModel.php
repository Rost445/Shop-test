<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'blog_category';

    public static function getSingle($id)
    {
        return self::find($id);
    }
    public static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('status', '=', 0) // status — это TINYINT, и 1 означает "Неактивна"
            ->where('is_delete', '=', 0)
            ->first();
    }
    public static function getRecord()
    {
        return self::select('blog_category.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc') // Упрощено, так как таблица должна быть связана с моделью
            ->get();
    }

    public static function getRecordActive()
    {
        return self::select('blog_category.*')
            ->where('blog_category.is_delete', '=', 0)
            ->where('blog_category.status', '=', 0)
            ->orderBy('blog_category.name', 'asc')
            ->get();
    }

    public function getCountBlog()
    {
        return $this->hasMany(BlogModel::class, 'blog_category_id')
            ->where('blog.is_delete', '=', 0)
            ->where('blog.status', '=', 0)
            ->count();
    }
}
