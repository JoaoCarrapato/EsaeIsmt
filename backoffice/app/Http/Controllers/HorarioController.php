<?php

namespace App\Http\Controllers;

//interfaces
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Input;

//models
use App\Disciplina;
use App\Horario;


class HorarioController extends Controller{
    
public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all Horário from database
            $horarios = Horario::all();
            
            foreach($horarios as $horario)
            {
                //add Horário to the collection
                $response->push([
                    'id' => $horario->id,
                    'weekday' => $horario->weekday,
                    'timebegin' => $horario->timebegin,
                    'timeend' => $horario->timeend,
                    'classroom' => $horario->classroom,
                    'disciplina_id' => $horario->disciplina_id
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
            
            $horario = Horario::create();
            $response->push(['created' => 'Horário created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating Horário.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $horario = Horario::findOrFail($id);
            $response->push([
                    'id' => $horarios->id,
                    'weekday' => $horarios->weekday,
                    'timebegin' => $horarios->timebegin,
                    'timeend' => $horarios->timeend,
                    'classroom' => $horarios->classroom,
                    'disciplina_id' => $horarios->disciplina_id
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Horário not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $horario = Horario::findOrFail($id);
            $horario->fill($dados->all())->save();
            $response->push(['updated' => 'Horário updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating Horário.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $horario = Horario::findOrFail($id);
            $horario->delete();
            $response->push(['success' => 'Horário deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting Horário.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }










}
