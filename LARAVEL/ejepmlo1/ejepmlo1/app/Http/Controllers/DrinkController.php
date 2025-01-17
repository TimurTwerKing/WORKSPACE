<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    
    public function getShopFromDrink(Request $request,$id){

        return $this->sendResponse(true, "Tienda a la que pertenece snack", Drink::find($id)->shop);
     }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(true, "Aqui tienes todas las bebidas", Drink::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {
        $params = $request->validate([
            "name" => "required|min:3",
            "brand" => "required|max:10",
            "size" => "required",
            "container" => "in:aluminium,plastic,carton",

        ]);

        $drink = Drink::create($params);
        return $this->sendResponse(true, "Bebida creada", $drink, 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink, $id)
    {
        return $this->sendResponse(true, "Bebida encontrada", Drink::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drink $drink, $id)
    {
        $params = $request->validate([
            "name" => "required|min:3",
            "brand" => "required|max:10",
            "size" => "required",
            "container" => "aluminium, plastic, carton",

        ]);

        Drink::find($id)->update($params);
        return Drink::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        //
    }
}
