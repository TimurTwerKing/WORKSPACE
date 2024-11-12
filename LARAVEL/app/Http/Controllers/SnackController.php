<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnackController extends Controller
{

    public function getById(Request $request, $id)
    {
        return "Devuelvo el snack con id : " . $id;
    }


    public function getAll()
    {
        return "Devuelvo los snacks desde el controller";
    }

    public function create()
    {
        return "Gracias por los snacks";
    }

    public function modify(Request $request, $id)
    {
        return "Snacks modificados";
    }

    public function delete(Request $request, $id)
    {
        return "Pues ya no quedan snacks";
    }


    public function getAlll(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return "Lista de snacks";
            case 'POST':
                return "Snack creado";
            case 'PATCH':
                return "Snack actualizado";
            case 'DELETE':
                return "Snack eliminado";
            default:
                return "Método no permitido";
        }
    }
}
