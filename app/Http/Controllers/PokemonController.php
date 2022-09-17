<?php

namespace App\Http\Controllers;


use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PokemonController extends Controller
{

    public function pokemonPage()
    {
        return view('pokemon.index');
    }

    public function getList(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $api = config('app.api') . 'pokemon';
        Log::info($api);
        try {
            $response = $client->request('GET',$api);
            if($response->getStatusCode() == 200){
                $res = $response->getBody();
                Log::debug(json_decode($res)->results);
                return json_decode($res)->results;
            }else{
                $json['status'] = $response->getStatusCode();
                $json['message'] = "Sorry something went wrong.";
            }
        } catch (\Exception $e) {
            Log::error($e);
            $json['status'] = 302;
            return $json;
        }
    }

    public function getListByTypes($type)
    {
        $client = new \GuzzleHttp\Client();
        $api = config('app.api').'type/'.$type;
    
        try {
            $response = $client->get($api);
            if($response->getStatusCode() == 200){
                $res = $response->getBody();
                Log::debug(json_decode($res)->pokemon);
                return json_decode($res)->pokemon;
            }else{
                $json['status'] = $response->getStatusCode();
                $json['message'] = "Sorry something went wrong.";

                return $json;
            }
        } catch (\Exception $e) {
        }
    }

    public function getListByGeneration($generation)
    {
        $client = new \GuzzleHttp\Client();
        $api = config('app.api').'generation/'.$generation;
    
        try {
            $response = $client->get($api);
            if($response->getStatusCode() == 200){
            $res = $response->getBody();
                Log::debug(json_decode($res)->pokemon_species);
                return json_decode($res)->pokemon_species;
            }else{
                $json['status'] = $response->getStatusCode();
                $json['message'] = "Sorry something went wrong.";

                return $json;
            }
        } catch (\Exception $e) {
        }
    }

    public function getTypes()
    {
        $client = new \GuzzleHttp\Client();
        $api = config('app.api').'type';
    
        try {
            $response = $client->request('GET',$api);
            if($response->getStatusCode() == 200){
            $res = $response->getBody();
                Log::debug(json_decode($res)->results);
                return json_decode($res)->results;
            }else{
                $json['status'] = $response->getStatusCode();
                $json['message'] = "Sorry something went wrong.";

                return $json;
            }
        } catch (\Exception $e) {
        }
    }

    public function getGeneration()
    {
        $client = new \GuzzleHttp\Client();
        $api = config('app.api').'generation';
    
        try {
            $response = $client->request('GET',$api);
            
            if($response->getStatusCode() == 200){
            $res = $response->getBody();
                Log::debug(json_decode($res)->results);
                return json_decode($res)->results;
            }else{
                $json['status'] = $response->getStatusCode();
                $json['message'] = "Sorry something went wrong.";

                return $json;
            }
        } catch (\Exception $e) {
        }
    }
}
