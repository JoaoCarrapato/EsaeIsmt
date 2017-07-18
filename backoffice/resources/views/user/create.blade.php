@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar novo Utilizador...</h1>
		<p class="lead">Insira toda a informação sobre o Utilizador.</p>
		<hr>
		<form action="{{ route('user.store')}}" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="email" class="control-label">Email:</label>
				<input type="text" id="email" name="email" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="curso" class="control-label">Curso:</label>
				<input type="text" id="curso" name="curso" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="photo" class="control-label">Foto:</label>
				<input type="text" id="photo" name="photo" class="form-control">
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Utilizador:</label>
				<input type="text" id="type" name="type" class="form-control" required>
			</div>

			<input type="submit" value="Inserir novo Utilizador" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
