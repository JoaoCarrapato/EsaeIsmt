@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar "{{ $financa->name }}"</h1>
		<p class="lead">Edite a informação.</p>
		<hr>
		<form action="{{ route('financa.update', $financa->id)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="id" class="control-label">Id:</label>
				<input type="number" id="id" name="id" class="form-control" value="{{ $financa->id }}" readonly> <!--readonly porque nao se pode mudar o id e se tentar mudar da berro-->
			</div>

			<div class="form-group">
				<label for="date" class="control-label">Data:</label>
				<input type="text" id="date" name="date" class="form-control" value="{{ $financa->date }}" required>
			</div>

			<div class="form-group">
				<label for="price" class="control-label">Valor:</label>
				<input type="text" id="price" name="price" class="form-control" value="{{ $financa->price }}" required>
			</div>

			<div class="form-group">
				<label for="paid" class="control-label">Pago?:</label>
				<input type="text" id="paid" name="paid" class="form-control" value="{{ $financa->paid }}" required>
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
