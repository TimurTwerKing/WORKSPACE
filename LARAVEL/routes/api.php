<?php

use App\Http\Controllers\DrinkController;
use App\Http\Middleware\Autentificador;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SnackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(SnackController::class)->prefix("/snacks")->group(function () {
    Route::get("{id}", "getById");
    Route::get("", "getAll");
    Route::post("", "create");
    Route::patch("{id}", "update");
    Route::delete("{id}", "delete")->middleware(Autentificador::class);
});

Route::apiResource("/shops", ShopController::class); //igual que arriba pero sin poder "personalizar get,post etc"

Route::get("/snacks/{id}", function ($id) {
    return "Snack ID: " . $id;
});

Route::get("/snacks", [SnackController::class, "getAll"]);


Route::patch("/snacks", function () {
    return "Snacks modificados";
});

Route::post("/drinks", [DrinkController::class, "create"]);
Route::get("/drinks", [DrinkController::class, "getById"]);