<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    use HasFactory;

    protected $table = 'color';

    protected $fillable = [
        'name',
        'code',
        'status',
        'created_by',
        'is_delete'
    ];

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        return self::select('color.*','users.name as created_by_name')
            ->join('users','users.id','=','color.created_by')
            ->where('color.is_delete',0)
            ->orderBy('color.id','desc')
            ->get();
    }

    public static function getRecordActive()
    {
        return self::where('is_delete',0)
            ->where('status',0)
            ->orderBy('name','asc')
            ->get();
    }
}