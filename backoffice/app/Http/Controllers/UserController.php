<?php

namespace App\Http\Controllers;

//interfaces
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Input;

//models

use App\Curso;
use App\User;


class UserController extends Controller {
    
public function index() {
        try {
            $statusCode = 200; //Ok

            //reset data collection
            $response = collect([]);

            //get all User from database
            $users = User::all();
            
            foreach($users as $user)
            {
                //add User to the collection
                $response->push([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'curso_id' => $user->curso_id
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
            
            $user = User::create();
            $response->push(['created' => 'User created successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error creating User.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $user = User::findOrFail($id);
            $response->push([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'curso_id' => $user->curso_id
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'User not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }

    public function update(Request $dados, $id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $user = User::findOrFail($id);
            $user->fill($dados->all())->save();
            $response->push(['updated' => 'User updated successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error updating User.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            
            $user = User::findOrFail($id);
            $user->delete();
            $response->push(['success' => 'User deleted successfully.']);
        } catch (Exception $e) {
            $response->push(['error' => 'Error deleting User.']);
            $statusCode = 404;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

}
