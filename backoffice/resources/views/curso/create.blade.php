@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar um novo Curso...</h1>
		<p class="lead">Insira toda a informação sobre o Curso.</p> <!--Vamos la começar a fazer estas paginas para tudo, vou acabar com uma dor de pescanhoço e ombros :( #road to 10-->
		<hr>
		<form action="{{ route('curso.store')}}" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Curso:</label>
				<input type="text" id="type" name="type" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="ects" class="control-label">Numero de ECTS:</label>
				<input type="number" id="ects" name="ects" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="descri" class="control-label">Descrição:</label>
				<input type="text" id="descri" name="descri" class="form-control" required>
			</div>

			<input type="submit" value="Inserir novo curso" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection
