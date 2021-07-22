<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function getColors()
    {
        $data = DB::table('colors')->get();

        if (count($data) >= 1) {
            return $data;
        }

        return response()->json(['response' => 'No Content'], 204);
    }

    public function addCarrito(Request $request){
        if ($request->isJson()){
            $data = $request->json()->all();

            $response = Color::create($data);

            if ($response) {
                return response()->json(['response' => true], 200);
            }

            return response()->json(['response' => false], 400);
        }

        return response()->json(['response' => false], 401);

    }

    public function updateCarrito(Request $request){
        if ($request->json()){
            $data = $request->json()->all();

            $response = Color::where('id', $data['id'])->update($data);

            if ($response == 1) {
                return response()->json(['response' => true], 200);
            }
            return response()->json(['response' => false], 400);
        }

        return response()->json(['response' => false], 401);

    }

    public function deleteCarrito(Request $request){
        if ($request->isJson()){
            $data = $request->json()->all();

            $response = Color::where('id', $data['id'])->delete();

            if ($response == 1) {
                return response()->json(['response' => true], 200);
            }

            return response()->json(['response' => false], 201);
        }

        return response()->json(['response' => false], 401);

    }

}
