<?php

namespace App\Http\Controllers;

//interfaces
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Input;

//models

use App\Documento;

class DocumentoController extends Controller{
    
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all documento from database
            $documentos = Documento::all();
            
            foreach($documentos as $documento)
            {
                //add Documento to the collection
                $response->push([
                    'id' => $documento->id,
                    'name' => $documento->name,
                    'type' => $documento->type
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
            
            $documento = Documento::create();
            $response->push(['created' => 'Documento created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Documentos.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $documento = Documento::findOrFail($id);
            $response->push([
                'id' => $documentos->id,
                'name' => $documentos->name,
            
                'type' => $documentos->type
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Documento not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $documento = Documento::findOrFail($id);
            $documento->fill($dados->all())->save();
            $response->push(['updated' => 'Documento updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Documento.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $documento = Documento::findOrFail($id);
            $documento->delete();
            $response->push(['success' => 'Documento deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Documento.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
