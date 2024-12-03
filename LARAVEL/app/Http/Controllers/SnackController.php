<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;

class SnackController extends Controller
{

    public function getById(Request $request, $id)
    {
        return "Devuelvo el snack con id : " . $id;
    }


    public function getAll()
    {
        return DB::table("snacks")->get();
    }

    public function create(Request $request)
    {
        $params = $request->validate([
            "name" => "required|min:3",
            "brand" => "required|max:10",
            "weight" => "required|gt:5|lt:25",
            "color" => "required|in:amarillo,rojo,verde"
        ]);

        $int = DB::table("snacks")->insert($params);
        if ($int !== true) {
            return "No se ha podido insertar: " . $params;
        }
        return "Exito al insertar: " . $params;


        // $params = $request->input();

        // // name -> required (min 3 caracteres)
        // if (empty($params["name"]) || strlen($params["name"]) < 3) {
        //     return "Demasiado corto, debe tener minimo 3 caracteres.";
        // }


        // // brand -> required (max 10 caracteres)
        // if (empty($params["brand"]) || strlen($params["brand"]) > 10) {
        //     return "Demasiado largo, debe ser maximo 10 caracteres.";
        // }


        // // weight -> entre 5 y 25
        // if (empty($params["weight"]) || $params["weight"] < 5 || $params["weight"] > 25) {
        //     return "Mal, debe ser entre 5 y 25.";
        // }


        // // color -> "amarillo", "rojo" o "verde"
        // if (empty($params["color"]) || $params["color"] != "amarillo" && $params["color"] != "rojo" && $params["color"] != "verde") {
        //     return "Mal, el color debe ser amarillo, rojo o verde";
        // }


        //    return $request->input() ['name'];
        //    return "Gracias por los snacks";
    }


    public function update(Request $request, $id)
    {
        $params = $request->validate([
            "name" => "required|min:3",
            "brand" => "required|max:10",
            "weight" => "required|gt:5|lt:25",
            "color" => "required|in:amarillo,rojo,verde"
        ]);

        // DB::table()
    }

    public function delete(Request $request, $id)
    {
        if (is_null(DB::table('snacks')->find($id))) {
            throw new ModelNotFoundException();
        }

        $int = DB::table("snacks")->delete($id);
        if ($int !== 1) {
            return $this->sendResponse(false, "No se ha podido eliminar", DB::table("snack")->find($id));
        }
        return "Erradicado";
    }


    // public function getAlll(Request $request)
    // {
    //     switch ($request->method()) {
    //         case 'GET':
    //             return "Lista de snacks";
    //         case 'POST':
    //             return "Snack creado";
    //         case 'PATCH':
    //             return "Snack actualizado";
    //         case 'DELETE':
    //             return "Snack eliminado";
    //         default:
    //             return "Método no permitido";
    //     }
    // }
}
