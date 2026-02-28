<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BlogCommentModel extends Model
{
    use HasFactory;
    protected $table = 'blog_comment';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public function  getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        
    }
}
