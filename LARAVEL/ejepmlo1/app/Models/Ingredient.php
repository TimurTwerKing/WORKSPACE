<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function snacks(){
        return $this->belongsToMany(Snack::class);
    }
}
