<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return DB::table("toys")->get(); //Query Builder
        // return Toy::all(); //Eloquent (ORM)
        return $this->sendResponse(true, "Juguetes obtenidos correctamente", Toy::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:32",
            "brand" => "required|string|max:16",
            "price" => "required|decimal:2|max:999",
            "batteries" => "required|boolean"
        ]);

        $toy = Toy::create($data);
        
        return $this->sendResponse(true, "Juguetes obtenidos correctamente", $toy);
    }

    /**
     * Display the specified resource.
     */
    public function show(Toy $toy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toy $toy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toy $toy)
    {
        //
    }
}
