<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/pokemon')->group(function () use ($router) {
    $router->post('registrar', [PokemonController::class, 'createPokemon']);
    $router->get('listar',[PokemonController::class, 'listarPokemones']);
        $router->get('ver',[PokemonController::class, 'verPokemon']);

});

Route::prefix('/region')->group(function () use ($router) {
    $router->post('registrar', [PokemonController::class, 'registrarRegion']);
    $router->get('listar',[PokemonController::class, 'listarPokemones']);

});