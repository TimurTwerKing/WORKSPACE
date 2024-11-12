<?php

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
    Route::patch("{id}", "modify");
    Route::delete("{id}", "delete")->middleware(Autentificador::class);
});

Route::apiResource("/shops", ShopController::class); //igual que arriba pero sin poder "personalizar get,post etc"

Route::get("/snacks/{id}", function ($id) {
    return "Snack ID: " . $id;
});

Route::get("/snacks", [SnackController::class, "getAll"]);

Route::post("/snacks", function () {
    return "Gracias por los snacks";
});

Route::patch("/snacks", function () {
    return "Snacks modificados";
});

Route::delete("/snacks", function () {
    return "Pues ya no quedan snacks";
});