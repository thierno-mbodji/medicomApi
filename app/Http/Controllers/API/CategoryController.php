<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $pharmacie = Pharmacie::all();
        return response()->json([
            'status' => 200,
            'pharmacie' => $pharmacie,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pharmacie_nom' => 'required|max:191',
            'pharmacie_adresse' => 'required|max:191',
            'pharmacie_numero' => 'required|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $pharmacie = new Pharmacie();
            $pharmacie->pharmacie_nom = $request->input('pharmacie_nom');
            $pharmacie->pharmacie_adresse = $request->input('pharmacie_adresse');
            $pharmacie->pharmacie_numero = $request->input('pharmacie_numero');

            $pharmacie->save();
            return response()->json([
                'status' => 200,
                'message' => 'Pharmacie Ajoutez avec Succes',
            ]);
        }
    }
}
