<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;

class Deliver extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AsSource;

    protected $guarded = ['id'];
    protected $appends = ['total_orders'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderDeliver::class);
    }

    public function getTotalOrdersAttribute()
    {
        return count($this->orders()->get());
    }
}
