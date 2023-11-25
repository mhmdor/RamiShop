<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function item()
    {
        return $this->belongsTo(Storage::class,'item_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
