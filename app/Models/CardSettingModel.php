<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardSettingModel extends Model
{
    use HasFactory;

    protected $table = 'card_setting';

    public static function getSingle()
{
    return self::first() ?? new self(); // Returns a new instance if no record exists.
}


}