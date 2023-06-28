<?php

namespace App\Repositories;

use App\Models\Pokemon;
use App\Models\Region;
use App\Services\PokemonService;
use Exception;
use Illuminate\Http\Response;

class PokemonRepository
{
    public function registrarPokemon($request)
    {
        try {

            $id_region = Region::where('reg_nombre', $request->region)->first();


//            $region = new RegionRepository;
//            $id_region = $region->buscarRegion($request);

            $pokemon = new Pokemon();
            $pokemon->nombre = $request->nombre;
            $pokemon->foto = $request->foto;
            $pokemon->region_id = $id_region->id;
            $pokemon->tipo = $request->tipo;
            $pokemon->save();

            return response()->json(["pokemon" => $pokemon], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listarPokemones($request)
    {
       // $pokemon = Pokemon::all();

        $resultado= new PokemonService;
        $pokemon= $resultado->ListadoPokemones();
        return response()->json(["pokemon" => $pokemon], Response::HTTP_OK);
    }


    public function verPokemon($request)
    {
        $pokemon = Pokemon::where('id', $request->id)
            ->with('region')
            ->first();
        return response()->json(["pokemon" => $pokemon], Response::HTTP_OK);
    }
}
