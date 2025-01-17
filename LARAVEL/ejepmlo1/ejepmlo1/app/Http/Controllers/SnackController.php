<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Snack;


class SnackController extends Controller
{


    public function getShopFromSnack(Request $request,$id){
       return Snack::find($id)->shop;

    }

    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        // return DB::table("snacks")->get();
        return Snack::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {

        $params = $request->validate([
            "name" => "required|min:3",
            "brand" => "required|max:10",
            "weight" => "required",
            "color" => "in:amarillo,rojo,verde",

        ]);

        $snack = Snack::create($params);
        // $id = DB::table("snacks")->insertGetId($params);
        return $this->sendResponse(true, "Snack creado", DB::table("snacks")->find($snack->id), 201);

    }

    /**
     * Display the specified resource.
     */
    public function getById(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->validate([
            "name" => "required|min:3",
            "brand" => "required|max:10",
            "weight" => "required",
            "color" => "in:amarillo,rojo,verde",

        ]);

        Snack::find($id)->update($params);


            // DB::table("snacks")->where("id", $id)->update($params);
            // return $this->sendResponse(true, "Elemento encontrado",DB::table("snacks")->find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->sendResponse(true, "Snack eliminado", DB::table("snacks")->delete($id));
    }
}
