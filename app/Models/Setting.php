<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name', 'value'];
    public $timestamps = false;

    public static function get($name, $default = null)
    {
        $setting = self::where('name', $name)->first();
        return $setting ? $setting->value : $default;
    }
}
