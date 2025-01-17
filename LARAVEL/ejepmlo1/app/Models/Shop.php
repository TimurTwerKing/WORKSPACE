<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function snacks(){
        return $this->hasMany(Snack::class);
    }

    public function drinks(){
        return $this->hasMany(Drink::class);
    }
}
