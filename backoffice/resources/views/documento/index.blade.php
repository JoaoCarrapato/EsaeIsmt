@extends('layouts.master')
@section('content')
  <div class="container-fluid">
    <h1>Lista de Documento</h1>
    <p class="lead">Lista de Documento</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome do Documento</th>
            <th>Tipo de Documento</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($documentos as $documento)
            <tr>
              <td><?php echo $documento->name; ?></td>
              <td><?php echo $documento->type; ?></td>

              <!-- coluna de editar documentos -->
             <td>
                <a class="btn btn-default" href="{{ URL::route('documento.edit', $documento->id) }}"><img src="{{ asset('img/edit.png') }}" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar documentos -->
              <td>
                <form action="{{ route('documento.destroy', $documento->id) }}" method="POST">
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
    <p><a href="{{ URL::route('documento.create') }}">Adicionar um documento?</a></p> <!--bem dito seja o Find/Replace entre os programadores #oremosirmãos-->
  </div>
@endsection
