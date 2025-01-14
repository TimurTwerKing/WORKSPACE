<?php

namespace App\Http\Controllers;

class Controller
{
    public function sendResponse($success, $message, $data = null)
    {
        return response()->json([
            "success" => $success,
            "message" => $message,
            "data" => $data
        ],);
    }
}
