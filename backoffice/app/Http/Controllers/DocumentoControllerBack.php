<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Documento;

class DocumentoControllerBack extends Controller
{
	public function index() {
		$documentos = Documento::all();
		if (is_null($documentos))
			return redirect()->route("index")->withErrors('Erro ao carregar documentos.');
		else
			return view("documento.index", compact("documentos"));
	}

	public function create() {
		return view("documento.create");
	}

	public function store(Request $dados) {
		$documento = Documento::create($dados->all());

		if(is_null($documento))
			return redirect()->route('documento.index')->withErrors('Erro ao criar documento.');
			else
				return redirect()->route('documento.index')->with('Documento inserido com sucesso!');
	}
	//isto esta levar mais tempo o que eu qero admitir, acabo um jogo um jogito... programar e stressante
	public function show($id) {
		$documento = Documento::findOrFail($id);

		if (is_null($documento))
			return redirect()->route('documento.index')->withErrors('Erro ao carregar documento.');
		else
			return view('documento.item', compact('documento'));
	}
	
	public function edit($id) {
		$documento = Documento::findOrFail($id);

		if (is_null($documento)) {
			return redirect()->route('documento.index')->withErrors('Erro ao carregar documento.');
		}
		else
		{
			return view('documento.edit', compact('documento'));
		}
	}

	public function update(Request $dados, $id) {
		$documento = Documento::findOrFail($id); //ainda agora comecei e ja estou falto disto 

		if (is_null($documento)) {
			return redirect()->route('documento.index')->withErrors('Erro ao carregar documento.');
		}
		else
		{
			$this->validate($dados, ['id' => 'required']);
			$dados_documento = $dados->all();
			$documento->fill($dados_documento)->save();

			return redirect()->route('documento.index')->with('flash_message', 'Documento atualizado com sucesso!');
		}
	}//vou ficar cheio de rugas :(
	public function destroy($id) {
		$documento = Documento::findOrFail($id);

		if (is_null($documento)) {
			return redirect()->route('documento.index')->withErrors('Erro ao carregar documento.');
		}
		else
		{
			$documento->delete();

			return redirect()->route('documento.index')->with('flash_message', 'Documento apagado com sucesso!');
		}
	}
}
