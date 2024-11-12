<?php

use App\Http\Controllers\SnackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/snacks", [SnackController::class, "getAll"]);

Route::post("/snacks", function(){
    return "Gracias por los snacks";
});

Route::patch("/snacks", function(){
    return "Snacks modificados";
});

Route::delete("/snacks", function(){
    return "Pues ya no quedan snacks";
});






Route::get("/shops", function(){
    return "Aquí están los shops";
});

Route::post("/shops", function(){
    return "Gracias por los shops";
});

Route::patch("/shops", function(){
    return "shops modificados";
});

Route::delete("/shops", function(){
    return "Pues ya no quedan shops";
});