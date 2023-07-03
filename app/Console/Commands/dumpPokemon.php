<?php

namespace App\Console\Commands;

use App\Repositories\PokemonRepository;
use Illuminate\Console\Command;

class dumpPokemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dumpeo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'carga la lista de pokemones en la base de datos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $repo = new PokemonRepository;
        $repo->dumpPokemones();
    }
}
