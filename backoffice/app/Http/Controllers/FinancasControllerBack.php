<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Financa;

class FinancasControllerBack extends Controller
{
	public function index() {
		$financas = Financa::all();
		if (is_null($financas))
			return redirect()->route("index")->withErrors('Erro ao carregar financas.');
		else
			return view("financa.index", compact("financas"));
	}

	public function create() {
		return view("financa.create");
	}

	public function store(Request $dados) {
		$financa = Financa::create($dados->all());

		if(is_null($financa))
			return redirect()->route('financa.index')->withErrors('Erro ao criar financa.');
			else
				return redirect()->route('financa.index')->with('Financa inserido com sucesso!');
	}
	public function show($id) {
		$financa = Financa::findOrFail($id);

		if (is_null($financa))
			return redirect()->route('financa.index')->withErrors('Erro ao carregar financa.');
		else
			return view('financa.item', compact('financa'));
	}
	
	public function edit($id) {
		$financa = Financa::findOrFail($id);

		if (is_null($financa)) {
			return redirect()->route('financa.index')->withErrors('Erro ao carregar financa.');
		}
		else
		{
			return view('financa.edit', compact('financa'));
		}
	}

	public function update(Request $dados, $id) {
		$financa = Financa::findOrFail($id); //ainda agora comecei e ja estou falto disto 

		if (is_null($financa)) {
			return redirect()->route('financa.index')->withErrors('Erro ao carregar financa.');
		}
		else
		{
			$this->validate($dados, ['id' => 'required']);
			$dados_financa = $dados->all();
			$financa->fill($dados_financa)->save();

			return redirect()->route('financa.index')->with('flash_message', 'Financa atualizado com sucesso!');
		}
	}
	public function destroy($id) {
		$financa = Financa::findOrFail($id);

		if (is_null($financa)) {
			return redirect()->route('financa.index')->withErrors('Erro ao carregar financa.');
		}
		else
		{
			$financa->delete();

			return redirect()->route('financa.index')->with('flash_message', 'Financa apagado com sucesso!');
		}
	}
}
