<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/offline',"offline.offline");
Route::get('/', '\App\Http\Controllers\PokemonController@pokemonPage');
Route::get('/pokemon/list','\App\Http\Controllers\PokemonController@getList');
Route::get('/pokemon/list/detail/{url}','\App\Http\Controllers\PokemonController@getListDetail');
Route::get('/pokemon/types','\App\Http\Controllers\PokemonController@getTypes');
Route::get('/pokemon/list/types/{type}','\App\Http\Controllers\PokemonController@getListByTypes');
Route::get('/pokemon/generations','\App\Http\Controllers\PokemonController@getGeneration');
Route::get('/pokemon/list/generations/{generation}','\App\Http\Controllers\PokemonController@getListByGeneration');