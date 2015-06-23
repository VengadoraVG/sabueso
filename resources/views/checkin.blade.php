@extends('layout')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      {!! Form::open(array('url' => 'checkin')) !!}
        {!! Form::label('Fecha de recepción') !!}
        {!! Form::text('storage_date', $storage_date,
                       array('required',
                             'class' => 'form-control',
                             'placeholder' => 'año-mes-día hora:minuto:segundo')) !!}

      <table class="table table-striped table-hover table-condensed" id="inventory">
        <thead>
          <th>Ingrediente</th>
          <th>Fecha de expiración</th>
          <th width="100px">Cantidad</th>
          <th width="50px">Eliminar</th>
        </thead>
        <tbody>
          <tr>
            <td contenteditable class="reagent"></td>
            <td contenteditable class="expiration_date"></td>
            <td contenteditable class="stock"></td>
            <td>
              <button type="button" class="btn btn-danger delete"> 
                <span class="glyphicon glyphicon-minus" aria-hidden="true" />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-default form-control" id="add">
        <span class="glyphicon glyphicon-plus" aria-hidden="true" /> 
      </button> <br /> <br />

      <p class="text-right">{!! Form::submit('Guardar',
                          array('class' => 'btn btn-primary')) !!}</p>

      {!! Form::hidden('new_reagents') !!}

      {!! Form::close() !!}
    </div>
  </div>

@stop

@section('script')
  <script src="/js/checkin.js"></script>
@stop
