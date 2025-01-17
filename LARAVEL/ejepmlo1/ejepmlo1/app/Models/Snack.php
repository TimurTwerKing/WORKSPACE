<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    protected $hidden = [
        "created_at",
        "update_at",
        "weight"
    ];

    protected $guarded = [
        "id",
        "created_at",
        "update_at"
    ];

    //Relaciones
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
