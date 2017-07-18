<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;

class UsersControllerBack extends Controller
{
	public function index() {
		$users = User::all();
		if (is_null($users))
			return redirect()->route("index")->withErrors('Erro ao carregar users.');
		else
			return view("user.index", compact("users"));
	}

	public function create() {
		return view("user.create");
	}

	public function store(Request $dados) {
		$user = User::create($dados->all());

		if(is_null($user))
			return redirect()->route('user.index')->withErrors('Erro ao criar user.');
			else
				return redirect()->route('user.index')->with('User inserido com sucesso!');
	}
	public function show($id) {
		$user = User::findOrFail($id);

		if (is_null($user))
			return redirect()->route('user.index')->withErrors('Erro ao carregar user.');
		else
			return view('user.item', compact('user'));
	}
	
	public function edit($id) {
		$user = User::findOrFail($id);

		if (is_null($user)) {
			return redirect()->route('user.index')->withErrors('Erro ao carregar user.');
		}
		else
		{
			return view('user.edit', compact('user'));
		}
	}

	public function update(Request $dados, $id) {
		$user = User::findOrFail($id); //ainda agora comecei e ja estou falto disto 

		if (is_null($user)) {
			return redirect()->route('user.index')->withErrors('Erro ao carregar user.');
		}
		else
		{
			$this->validate($dados, ['id' => 'required']);
			$dados_user = $dados->all();
			$user->fill($dados_user)->save();

			return redirect()->route('user.index')->with('flash_message', 'User atualizado com sucesso!');
		}
	}
	public function destroy($id) {
		$user = User::findOrFail($id);

		if (is_null($user)) {
			return redirect()->route('user.index')->withErrors('Erro ao carregar user.');
		}
		else
		{
			$user->delete();

			return redirect()->route('user.index')->with('flash_message', 'User apagado com sucesso!');
		}
	}
}