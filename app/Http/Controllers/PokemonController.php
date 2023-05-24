<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use App\Repositories\PokemonRepository;
use App\Repositories\RegionRepository;
use App\Repositories\TipoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PokemonController extends Controller
{


    protected PokemonRepository $pokemonRepository;
    protected RegionRepository $regionRepository;
    protected TipoRepository $tipoRepository;

    public function __construct(
        PokemonRepository $pokemonRepository,
        RegionRepository $regionRepository,
        TipoRepository $tipoRepository) {

        $this->$pokemonRepository = $pokemonRepository;
        $this->$regionRepository = $regionRepository;
        $this->$tipoRepository = $tipoRepository;
    }

    public function createPokemon(PokemonRequest $request)
    {
        return $this->pokemonRepository->registrarPokemon($request);
    }

    public function listarPokemones(Request $request)
    {
        return $this->pokemonRepository->listarPokemones($request);
    }
}
