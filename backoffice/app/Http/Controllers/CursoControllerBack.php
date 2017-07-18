<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Curso;

class CursoControllerBack extends Controller
{
	public function index() {
		$cursos = Curso::all();
		if (is_null($cursos))
			return redirect()->route("index")->withErrors('Erro ao carregar cursos.');
		else
			return view("curso.index", compact("cursos"));
	}

	public function create() {
		return view("curso.create");
	}

	public function store(Request $dados) {
		$curso = Curso::create($dados->all());

		if(is_null($curso))
			return redirect()->route('curso.index')->withErrors('Erro ao criar curso.');
			else
				return redirect()->route('curso.index')->with('Curso inserido com sucesso!');
	}

	public function show($id) {
		$curso = Curso::findOrFail($id);

		if (is_null($curso))
			return redirect()->route('curso.index')->withErrors('Erro ao carregar curso.');
		else
			return view('curso.item', compact('curso'));
	}
	
	public function edit($id) {
		$curso = Curso::findOrFail($id);

		if (is_null($curso)) {
			return redirect()->route('curso.index')->withErrors('Erro ao carregar curso.');
		}
		else
		{
			return view('curso.edit', compact('curso'));
		}
	}

	public function update(Request $dados, $id) {
		$curso = Curso::findOrFail($id); //ainda agora comecei e ja estou falto disto 

		if (is_null($curso)) {
			return redirect()->route('curso.index')->withErrors('Erro ao carregar curso.');
		}
		else
		{
			$this->validate($dados, ['id' => 'required']);
			$dados_curso = $dados->all();
			$curso->fill($dados_curso)->save();

			return redirect()->route('curso.index')->with('flash_message', 'Curso atualizado com sucesso!');
		}
	}
	public function destroy($id) {
		$curso = Curso::findOrFail($id);

		if (is_null($curso)) {
			return redirect()->route('curso.index')->withErrors('Erro ao carregar curso.');
		}
		else
		{
			$curso->delete();

			return redirect()->route('curso.index')->with('flash_message', 'Curso apagado com sucesso!');
		}
	}
}
