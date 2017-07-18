<?php

namespace App\Http\Controllers;

//interfaces
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Input;

//models

use App\Financa;

class FinancaController extends Controller{
    
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all financa from database
            $financas = Financa::all();
            
            foreach($financas as $financa)
            {
                //add Financa to the collection
                $response->push([
                    'id' => $financa->id,
                    'date' => $financa->date,
                    'price' => $financa->price,
                    'paid' => $financa->paid
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function store(Request $dados) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $financa = Financa::create();
            $response->push(['created' => 'Financa created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Financas.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $financa = Financa::findOrFail($id);
            $response->push([
                'id' => $financa->id,
                'date' => $financa->date,
                'price' => $financa->price,
                'paid' => $financa->paid
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Financa not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $financa = Financa::findOrFail($id);
            $financa->fill($dados->all())->save();
            $response->push(['updated' => 'Financa updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Financa.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $financa = Financa::findOrFail($id);
            $financa->delete();
            $response->push(['success' => 'Financa deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Financa.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}