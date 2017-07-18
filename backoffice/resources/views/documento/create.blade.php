@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar um novo Documento...</h1>
		<p class="lead">Insira toda a informação sobre o Documento.</p>
		<hr>
		<form action="{{ route('documento.store')}}" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Documento:</label>
				<input type="text" id="type" name="type" class="form-control" required>
			</div>

			<input type="submit" value="Inserir novo documento" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
