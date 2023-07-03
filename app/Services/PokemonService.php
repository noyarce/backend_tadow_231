<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokemonService
{
    public function ListadoPokemones()
    {
        $url = "https://pokeapi.co/api/v2/pokemon?limit=1300";
        $response = Http::get($url);

        return json_decode($response);
    }

    public function pokemonIndividual($id)
    {
        $url = "https://pokeapi.co/api/v2/pokemon?";

        $response = Http::get($url . $id);
        return json_decode($response);
    }
}
