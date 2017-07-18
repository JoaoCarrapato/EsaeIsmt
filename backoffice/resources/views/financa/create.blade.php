@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar uma nova Finança...</h1>
		<p class="lead">Insira toda a informação sobre a Finança.</p>
		<hr>
		<form action="{{ route('financa.store')}}" method="POST">
		
			<div class="form-group">
				<label for="date" class="control-label">Data:</label>
				<input type="text" id="date" name="date" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="price" class="control-label">Valor:</label>
				<input type="text" id="price" name="price" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="paid" class="control-label">Pago?:</label>
				<input type="text" id="paid" name="paid" class="form-control" required>
			</div>

			<input type="submit" value="Inserir nova Propina/Multa" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
