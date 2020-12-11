<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AsSource;

    protected $guarded = ['id'];

    static function uid()
    {
        $uid = Str::random(8);

        if (self::whereUid($uid)->first()) {
            return self::uid();
        }

        return $uid;
    }
}
