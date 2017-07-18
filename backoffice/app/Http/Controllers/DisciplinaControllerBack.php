<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Disciplina;

class DisciplinaControllerBack extends Controller
{
	public function index() {
		$disciplinas = Disciplina::all();
		if (is_null($disciplinas))
			return redirect()->route("index")->withErrors('Erro ao carregar disciplinas.');
		else
			return view("disciplina.index", compact("disciplinas"));
	}

	public function create() {
		return view("disciplina.create");
	}

	public function store(Request $dados) {
		$disciplina = Disciplina::create($dados->all());

		if(is_null($disciplina))
			return redirect()->route('disciplina.index')->withErrors('Erro ao criar disciplina.');
			else
				return redirect()->route('disciplina.index')->with('Disciplina inserido com sucesso!');
	}

	public function show($id) {
		$disciplina = Disciplina::findOrFail($id);

		if (is_null($disciplina))
			return redirect()->route('disciplina.index')->withErrors('Erro ao carregar disciplina.');
		else
			return view('disciplina.item', compact('disciplina'));
	}
	
	public function edit($id) {
		$disciplina = Disciplina::findOrFail($id);

		if (is_null($disciplina)) {
			return redirect()->route('disciplina.index')->withErrors('Erro ao carregar disciplina.');
		}
		else
		{
			return view('disciplina.edit', compact('disciplina'));
		}
	}

	public function update(Request $dados, $id) {
		$disciplina = Disciplina::findOrFail($id);

		if (is_null($disciplina)) {
			return redirect()->route('disciplina.index')->withErrors('Erro ao carregar disciplina.');
		}
		else
		{
			$this->validate($dados, ['id' => 'required']);
			$dados_disciplina = $dados->all();
			$disciplina->fill($dados_disciplina)->save();

			return redirect()->route('disciplina.index')->with('flash_message', 'Disciplina atualizada com sucesso!');
		}
	}
	public function destroy($id) {
		$disciplina = Disciplina::findOrFail($id);

		if (is_null($disciplina)) {
			return redirect()->route('disciplina.index')->withErrors('Erro ao carregar disciplina.');
		}
		else
		{
			$disciplina->delete();

			return redirect()->route('disciplina.index')->with('flash_message', 'Disciplina apagada com sucesso!');
		}
	}
}
