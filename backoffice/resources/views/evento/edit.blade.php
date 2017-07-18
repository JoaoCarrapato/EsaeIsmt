@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar "{{ $evento->name }}"</h1>
		<p class="lead">Edite a informação.</p>
		<hr>
		<form action="{{ route('evento.update', $evento->id)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="id" class="control-label">Id:</label>
				<input type="number" id="id" name="id" class="form-control" value="{{ $evento->id }}" readonly> <!--readonly porque nao se pode mudar o id e se tentar mudar da berro-->
			</div>

			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" value="{{ $evento->name }}" required>
			</div>

			<div class="form-group">
				<label for="date" class="control-label">Data:</label>
				<input type="number" id="date" name="date" class="form-control" value="{{ $evento->date }}" required>
			</div>

			<div class="form-group">
				<label for="local" class="control-label">Local:</label>
				<input type="text" id="local" name="local" class="form-control" value="{{ $evento->local }}" required>
			</div>

			<div class="form-group">
				<label for="descri" class="control-label">Descrição:</label>
				<input type="text" id="descri" name="descri" class="form-control" value="{{ $evento->descri }}">
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
