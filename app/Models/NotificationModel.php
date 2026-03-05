<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class NotificationModel extends Model
{
    use HasFactory;

    protected $table = 'notification';

    public static function getSingle($id)
    {
        return self::find($id);
    }
    public static function getAll()
{
    return self::orderBy('id', 'desc')->paginate(40);
}

public static function getByUser($user_id)
{
    return self::where('user_id', $user_id)
        ->orderBy('id', 'desc')
        ->paginate(40);
}

    public static function insertRecord($user_id, $message, $url)
    {
        $save = new NotificationModel();
        $save->user_id = $user_id;
        $save->message = $message;
        $save->url = $url;
        $save->save();
    }

    public static function getRecord()
    {
        return NotificationModel::where('user_id', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(40);
    }

    public static function getRecordUser($user_id)
    {
        return NotificationModel::where('user_id', '=', $user_id)
            ->orderBy('id', 'desc')
            ->paginate(40);
    }

public static function getUnreadByUser($user_id)
{
    return self::where('user_id', $user_id)
        ->where('is_read', 0)
        ->orderBy('id', 'desc')
        ->get();
}

public static function getUnreadCount($user_id)
{
    return self::where('user_id', $user_id)
        ->where('is_read', 0)
        ->count();
}

    public static function getUnreadNotification()
    {
     return self::where('is_read', 0)
            ->where('user_id', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function getUnreadNotificationCount($user_id){
     return self::where('is_read', 0)
            ->where('user_id', '=', $user_id)
            ->count();
    }

    public static function updateReadNoti($id)
    {
        $getRecord = NotificationModel::getSingle($id);

        if (!empty($getRecord)) {
            $getRecord->is_read = 1;
            $getRecord->save();
        }
    }
}
