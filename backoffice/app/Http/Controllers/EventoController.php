<?php

namespace App\Http\Controllers;

//interfaces
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Input;


use App\Evento;

class EventoController extends Controller{
        
public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all User from database
            $eventos = Evento::all();
            
            foreach($eventos as $evento)
            {
                //add User to the collection
                $response->push([
                    'id' => $evento->id,
                    'name' => $evento->name,
                    'date' => $evento->date,
                    'local' => $evento->local,
                    'descri' => $evento->descri
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
