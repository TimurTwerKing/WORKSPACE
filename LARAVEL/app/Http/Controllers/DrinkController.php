<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'brand' => 'required|max:20',
            'ml' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0'
        ]);
        $drink = Drink::create($data);

        return response()->json(["todo guay", $drink], 201);
    }

    public function getById(Request $request, $id)
    {
        $drink = Drink::findOrFail($id);

        return response()->json(["todo guay", $drink], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drink $drink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        //
    }
}
