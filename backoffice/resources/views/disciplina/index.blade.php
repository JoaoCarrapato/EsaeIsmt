@extends('layouts.master')
@section('content')
  <div class="container-fluid">
    <h1>Lista de Disciplinas</h1>
    <p class="lead">Lista de Disciplinas</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome da Disciplina</th>
            <th>Semestre</th>
            <th>Professor(a)</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($disciplinas as $disciplina)
            <tr>
              <td><?php echo $disciplina->name; ?></td>
              <td><?php echo $disciplina->semester; ?></td>
              <td><?php echo $disciplina->prof; ?></td>

              <!-- coluna de editar disciplinas -->
             <td>
                <a class="btn btn-default" href="{{ URL::route('disciplina.edit', $disciplina->id) }}"><img src="{{ asset('img/edit.png') }}" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar disciplinas -->
              <td>
                <form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger">
                    <img src="{{ asset('img/delete.png') }}" width="25" height="25">
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p><a href="{{ URL::route('disciplina.create') }}">Adicionar uma disciplina?</a></p> <!--bem dito seja o Find/Replace entre os programadores #oremosirmãos-->
  </div>
@endsection
