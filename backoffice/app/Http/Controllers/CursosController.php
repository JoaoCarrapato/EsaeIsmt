<?php

namespace App\Http\Controllers;

//interfaces
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Input;

//models

use App\Disciplina;
use App\User;
use App\Curso;

class CursosController extends Controller{
    
    public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all curso from database
            $cursos = Curso::all();
            
            foreach($cursos as $curso)
            {
                //add Curso to the collection
                $response->push([
                    'id' => $curso->id,
                    'name' => $curso->name,
                    'type' => $curso->type
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
            
            $curso = Curso::create();
            $response->push(['created' => 'Curso created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Cursos.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $curso = Curso::findOrFail($id);
            $response->push([
                'id' => $cursos->id,
                'name' => $cursos->name,
                'age' => $cursos->age,
                'disciplina_id' => $cursos->disciplina_id
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Curso not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $curso = Curso::findOrFail($id);
            $curso->fill($dados->all())->save();
            $response->push(['updated' => 'Curso updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Curso.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $curso = Curso::findOrFail($id);
            $curso->delete();
            $response->push(['success' => 'Curso deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Curso.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}
