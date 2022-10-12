<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function shop()
    {
        return $this->BelongsTo(Shop::class);
    }

    protected $fillable = [
        'date',
        'time',
        'member',
        'user_id',
        'shop_id'
    ];
}
