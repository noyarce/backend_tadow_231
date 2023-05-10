<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PokemonController extends Controller
{
    public function createPokemon(PokemonRequest $request){
        Log::info(["REquest"=>$request->all()]);

        $pokemon = new Pokemon();
        $pokemon->nombre=$request->nombre;
        $pokemon->foto=$request->foto;
        $pokemon->save();

        return $pokemon;

    }

    public function listarPokemones(Request $request){
        $pokemon = Pokemon::all();
        return $pokemon;
    }
}
