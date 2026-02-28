<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request; 

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        $return = self::select('contact_us.*');

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like','%'.Request::get('name').'%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like','%'.Request::get('email').'%');
        }

        if (!empty(Request::get('phone'))) {
            $return = $return->where('phone', 'like','%'.Request::get('phone').'%');
        }

        if (!empty(Request::get('subject'))) {
            $return = $return->where('subject', 'like','%'.Request::get('subject').'%');
        }
        if (!empty(Request::get('message'))) {
            $return = $return->where('message', 'like','%'.Request::get('message').'%');
        }

        $return = $return->orderBy('contact_us.id', 'desc')
        ->paginate(30);
        return $return;
    }

    public function getUSer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
