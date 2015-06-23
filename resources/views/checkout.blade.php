@extends('layout')

@section('content')
  {!! Form::open(array('url' => 'checkout')) !!}
  <div class="form-group">
    {!! Form::label('Ingrediente') !!}
      {!! Form::text('reagent', null,
                     array('required',
                           'class' => 'form-control',
                           'placeholder' => 'Ingrediente a retirar')) !!}
  </div>

  <p><button type="button" class="btn btn-default" id="search"> Buscar </button></p>
  {!! Form::close() !!}

  <div id="response">

    <table class="table table-bordered">
      <tr><td>
        <h1>En almacenes...</h1>
        <table class="table table-striped table-hover table-condensed"
               id="storage">
          <thead>
            <tr>
              <th>Ingrediente</th>
              <th>Código</th>
              <th>Fecha de expiración</th>
              <th>En almacén</th>
              <th>Retirar</th>
            </tr>
          </thead>

          <tbody>
          </tbody>
        </table>
      </td></tr>

      <tr><td>
        <h1>Para retirar...</h1>
        <table class="table table-striped table-hover table-condensed"
               id="inventory">
          <thead>
            <tr>
              <th>Ingrediente</th>
              <th>Código</th>
              <th>Fecha de expiración</th>
              <th>En almacén</th>
              <th>Retirar</th>
            </tr>
          </thead>

          <tbody>
          </tbody>
        </table>
      </td></tr>
    </table>

    {!! Form::open(array('url' => 'checkout')) !!}
    <p class="text-right">
      {!! Form::submit('Confirmar',
                        array('class' => 'btn btn-danger')) !!}
    </p>
    {!! Form::close() !!}

  </div>
@stop

@section('script')
  <script src="/js/checkout.js"></script>
@stop
