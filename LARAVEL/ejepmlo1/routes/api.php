<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\ToyController;
use App\Http\Middleware\Autenticado;
use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});//->middleware('auth:sanctum');


Route::prefix("/snacks")->controller(SnackController::class)->group(function(){
    Route::get("","getAll");
    Route::get("{id}","getById");
    Route::post("","create");
    Route::patch("{id}","update");
    Route::delete("{id}","delete")->middleware(Autenticado::class); 
    Route::get("{id}/shop","getShopFromSnack");
});

Route::prefix("/drinks")->controller(DrinkController::class)->group(function(){
    Route::get("","index");
    Route::get("{id}","show");
    Route::post("","store");
    Route::patch("{id}","update");
    Route::delete("{id}","delete")->middleware(Autenticado::class);
    Route::get("{id}/shop","getShopFromDrink"); 
});


Route::apiResource("/shops", ShopController::class);
Route::get("/shops/{id}/snacks",[ShopController::class,"getSnacksFromShop"]);
Route::get("/shops/{id}/drinks",[ShopController::class,"getDrinksFromShop"]);

Route::apiResource("/toys", ToyController::class);
