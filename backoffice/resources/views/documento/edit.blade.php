@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar "{{ $documento->name }}"</h1>
		<p class="lead">Edite a informação.</p>
		<hr>
		<form action="{{ route('documento.update', $documento->id)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="id" class="control-label">Id:</label>
				<input type="number" id="id" name="id" class="form-control" value="{{ $documento->id }}" readonly> <!--readonly porque nao se pode mudar o id e se tentar mudar da berro-->
			</div>

			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" value="{{ $documento->name }}" required>
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Documento:</label>
				<input type="number" id="type" name="type" class="form-control" value="{{ $documento->type }}" required>
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
