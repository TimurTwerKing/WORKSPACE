<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getSnacksFromShop(Request $request,$id){
        return Shop::find($id)->snacks;
    }

    public function getDrinksFromShop(Request $request,$id){
        return $this->sendResponse(true, "Todos los snack que pertenecen a la tienda encontrados", Shop::find($id)->drinks);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Devuelovo las tiendas";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Guardo una tienda";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Devuelvo la tienda con id: " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Modifico la tienda con id: " . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Elimino la tienda con id: " . $id;
    }
}
