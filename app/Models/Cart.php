<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(CartItem::class,'cart_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
