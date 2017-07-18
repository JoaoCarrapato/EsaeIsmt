@extends('layouts.master')
@section('content')
  <div class="container-fluid">
    <h1>Lista de finanças</h1>
    <p class="lead">Lista de finanças</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Curso</th>
            <th>Foto</th>
            <th>Tipo de Utilizador</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $user)
            <tr>
              <td><?php echo $user->name; ?></td>
              <td><?php echo $user->curso; ?></td>
              <td><?php echo $user->photo; ?></td>
              <td><?php echo $user->type; ?></td>

              <!-- coluna de editar users -->
             <td>
                <a class="btn btn-default" href="{{ URL::route('user.edit', $user->id) }}"><img src="{{ asset('img/edit.png') }}" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar users -->
              <td>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
    <p><a href="{{ URL::route('user.create') }}">Adicionar Utilizador?</a></p> <!--bem dito seja o Find/Replace entre os programadores #oremosirmãos-->
  </div>
@endsection
