<?php

namespace App\Models;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class BlogModel extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'title',
        'blog_category_id',
        'description',
        'short_description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image_name',
        'slug',
    ];

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
        return self::select('blog.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc') // Упрощено, так как таблица должна быть связана с моделью
            ->paginate(30);
    }

    public static function getRecordActive()
    {
        return self::select('blog.*')
            ->where('blog.is_delete', '=', 0)
            ->where('blog.status', '=', 0)
            ->Limit(3)
            ->orderBy('blog.id', 'asc')
            ->get();
    }
    public static function getRecordActiveHome()
    {
        return self::select('blog.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc') // Упрощено, так как таблица должна быть связана с моделью
            ->paginate(30);
    }

    public static function getBlog($category_id ='')
    {
        $return = self::select('blog.*');

        if (!empty(Request::get('search'))) {
            $return = $return->where('blog.title', 'like', '%' . Request::get('search') . '%');
        }
        if ($category_id) {
            $return = $return->where('blog.blog_category_id', $category_id);
        }

        $return = $return->where('blog.is_delete', '=', 0)
            ->where('blog.status', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(20);

        return $return;
    }

    public static function getPopular()
    {
        $return = self::select('blog.*');

        $return = $return->where('blog.is_delete', '=', 0)
            ->where('blog.status', '=', 0)
            ->orderBy('blog.total_view', 'desc')
            ->limit(6)
            ->get();
        return $return;
    }
    public static function getRelatedPost($blog_category_id, $blog_id)
    {
        $return = self::select('blog.*');

        $return = $return->where('blog.is_delete', '=', 0)
            ->where('blog.blog_category_id', '=', $blog_category_id)
            ->where('blog.id', '!=', $blog_id)
            ->where('blog.status', '=', 0)
            ->orderBy('blog.total_view', 'desc')
            ->limit(6)
            ->get();
        return $return;
    }

    public function getImage()
    {
        if (!empty($this->image_name) && file_exists('upload/blog/' . $this->image_name)) {
            return url('upload/blog/' . $this->image_name);
        }
        return null;
    }

    public function getCategory()
    {
        return $this->belongsTo(BlogCategoryModel::class, 'blog_category_id');
    }

    public function getComment()
    {
        return $this->hasMany(BlogCommentModel::class, 'blog_id')
            ->select('blog_comment.*')
            ->join('users', 'users.id', '=', 'blog_comment.user_id')
            ->orderBy('blog_comment.id', 'desc');
    }
    public function getCommentCount()
    {
        return $this->hasMany(BlogCommentModel::class, 'blog_id')
            ->select('blog_comment.id')
            ->join('users', 'users.id', '=', 'blog_comment.user_id')
            ->count();
    }
}
