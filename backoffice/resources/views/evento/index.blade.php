@extends('layouts.master')
@section('content')
  <div class="container-fluid">
    <h1>Lista de Eventos</h1>
    <p class="lead">Lista de Eventos</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome do Evento</th>
            <th>Date</th>
            <th>Local</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($eventos as $evento)
            <tr>
              <td><?php echo $evento->name; ?></td>
              <td><?php echo $evento->date; ?></td>
              <td><?php echo $evento->local; ?></td>
              <td><?php echo $evento->descri; ?></td>

              <!-- coluna de editar eventos -->
             <td>
                <a class="btn btn-default" href="{{ URL::route('evento.edit', $evento->id) }}"><img src="{{ asset('img/edit.png') }}" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar eventos -->
              <td>
                <form action="{{ route('evento.destroy', $evento->id) }}" method="POST">
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
    <p><a href="{{ URL::route('evento.create') }}">Adicionar um evento?</a></p> <!--bem dito seja o Find/Replace entre os programadores #oremosirmãos-->
  </div>
@endsection
