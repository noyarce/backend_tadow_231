<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use App\Repositories\PokemonRepository;
use App\Repositories\RegionRepository;
use App\Repositories\TipoRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;

class PokemonController extends Controller
{
    protected PokemonRepository $pokemonRepository;
    protected RegionRepository $regionRepository;
    protected TipoRepository $tipoRepository;

//     public function __construct(PokemonRepository $pokemonRepository,RegionRepository $regionRepository,
// TipoRepository $tipoRepository) {

//         $this->$pokemonRepository = $pokemonRepository;
//         $this->$regionRepository = $regionRepository;
//         $this->$tipoRepository = $tipoRepository;
//     }

    public function createPokemon(PokemonRequest $request)
    {
       try {
            $pokemon = new Pokemon();
            $pokemon->nombre = $request->nombre;
            $pokemon->foto = $request->foto;
            $pokemon->region= $request->region;
            $pokemon->tipo= $request->tipo;
            $pokemon->save();

            return response()->json(["pokemon" => $pokemon], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
       
       // return $this->pokemonRepository->registrarPokemon($request);
    }

    public function listarPokemones(Request $request)
    {
     $pokemon = Pokemon::all();
        return response()->json(["pokemon" => $pokemon], Response::HTTP_OK);
       // return $this->pokemonRepository->listarPokemones($request);
    }
}
