<?php

namespace App\Repositories;

use App\Models\Pokemon;
use Exception;
use Illuminate\Http\Response;

class PokemonRepository
{
    public function registrarPokemon($request)
    {
        try {
            $pokemon = new Pokemon();
            $pokemon->nombre = $request->nombre;
            $pokemon->foto = $request->foto;
            $pokemon->save();
            return response()->json(["pokemon" => $pokemon], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listarPokemones($request)
    {
        $pokemon = Pokemon::all();
        return $pokemon;
    }
}
