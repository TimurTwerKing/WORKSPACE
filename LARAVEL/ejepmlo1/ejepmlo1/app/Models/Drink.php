<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    /** @use HasFactory<\Database\Factories\DrinkFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "brand",
        "size",
        "container"
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
