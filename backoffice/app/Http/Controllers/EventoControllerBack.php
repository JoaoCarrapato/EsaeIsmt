<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Evento;

class EventoControllerBack extends Controller
{
	public function index() {
		$eventos = Evento::all();
		if (is_null($eventos))
			return redirect()->route("index")->withErrors('Erro ao carregar eventos.');
		else
			return view("evento.index", compact("eventos"));
	}

	public function create() {
		return view("evento.create");
	}

	public function store(Request $dados) {
		$evento = Evento::create($dados->all());

		if(is_null($evento))
			return redirect()->route('evento.index')->withErrors('Erro ao criar evento.');
			else
				return redirect()->route('evento.index')->with('Evento inserido com sucesso!');
	}

	public function show($id) {
		$evento = Evento::findOrFail($id);

		if (is_null($evento))
			return redirect()->route('evento.index')->withErrors('Erro ao carregar evento.');
		else
			return view('evento.item', compact('evento'));
	}
	
	public function edit($id) {
		$evento = Evento::findOrFail($id);

		if (is_null($evento)) {
			return redirect()->route('evento.index')->withErrors('Erro ao carregar evento.');
		}
		else
		{
			return view('evento.edit', compact('evento'));
		}
	}

	public function update(Request $dados, $id) {
		$evento = Evento::findOrFail($id);

		if (is_null($evento)) {
			return redirect()->route('evento.index')->withErrors('Erro ao carregar evento.');
		}
		else
		{
			$this->validate($dados, ['id' => 'required']);
			$dados_evento = $dados->all();
			$evento->fill($dados_evento)->save();

			return redirect()->route('evento.index')->with('flash_message', 'Evento atualizado com sucesso!');
		}
	}
	public function destroy($id) {
		$evento = Evento::findOrFail($id);

		if (is_null($evento)) {
			return redirect()->route('evento.index')->withErrors('Erro ao carregar evento.');
		}
		else
		{
			$evento->delete();

			return redirect()->route('evento.index')->with('flash_message', 'Evento apagada com sucesso!');
		}
	}
}
