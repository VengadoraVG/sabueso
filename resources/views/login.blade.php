@extends('layout')

@section('title')
  Login
@stop

@section('content')
  @if(isset($woops))
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="alert alert-danger" role="alert" id="wrong-data">
            Datos incorrectos
          </div>
        </div>
      </div>
    </div>
  @endif

  <div class="container col-md-4 col-md-offset-4">
    <h1 class="text-center">Loguéate</h1>
    {!! HTML::image('/img/sabueso.svg', 'sabueso',
                    array('class' => 'img-responsive center-block')) !!}
    <p class="text-center"><strong class="lead">Sabueso</strong><br />
      Sistema de mantenimiento para almacenes con productos perecederos.</p>


    @if(!Auth::check())
    {!! Form::open(array('url' => 'login',
                         'class' => 'form')) !!}

    <div class="form-group">

      {!! Form::label('Número Telefónico') !!}
      {!! Form::text('phone', null,
                     array('required',
                           'class' => 'form-control',
                           'placeholder' => 'Sólamente números')) !!}
    </div>

    <div class="form-group">
      {!! Form::label('Contraseña') !!}
      {!! Form::password('password', array('class' => 'form-control',
                                           'placeholder' => 'Sensible a mayúsculas y minúsculas')) !!}
    </div>

    <div class="form-group">
      <p class="text-center">
      {!! Form::submit('Loguéame',
                       array('class' => 'btn btn-primary btn-large')) !!}
      </p>
      <p class="text-center">
        <a href="register">¿Aún sin cuenta? ¡Solicita una!</a>
      </p>
    </div>

    {!! Form::close() !!}
    @else

    <div class="alert alert-danger" role="alert" id="id">
      <p class="text-center">Ya estás logueado.<br />
        Tu número telefónico es: <strong>{!! Auth::user()->phone !!}</strong></p>
    </div>

    @endif
  </div>
@stop
