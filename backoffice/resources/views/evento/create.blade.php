@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar uma novo Evento...</h1>
		<p class="lead">Insira toda a informação sobre o Evento.</p>
		<hr>
		<form action="{{ route('evento.store')}}" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="date" class="control-label">Data:</label>
				<input type="text" id="date" name="date" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="local" class="control-label">Local:</label>
				<input type="text" id="local" name="local" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="descri" class="control-label">Descrição:</label>
				<input type="text" id="descri" name="descri" class="form-control">
			</div>


			<input type="submit" value="Inserir nova evento" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
