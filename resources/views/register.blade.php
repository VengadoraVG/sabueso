@extends('layout')

@section('title')
  Registro
@stop

@section('content')
  <script src="register.js"></script>

  <div class="container col-md-4 col-md-offset-4" ng-app="register" ng-controller="Register">
    <div class="alert alert-danger" role="alert" id="password-neq-alert"> <strong>ERROR: </strong>Las contraseñas no coinciden </div>

    <h1 class="text-center">Regístrate</h1>
    {!! HTML::image('/img/sabueso.svg', 'sabueso', 
                    array('class' => 'img-responsive center-block')) !!}
    <p class="text-center"><strong class="lead">Sabueso</strong><br /> 
      Sistema de mantenimiento para almacenes con productos perecederos.</p>

    @if(!Auth::check())
    {!! Form::open(array('url' => 'register', 
                         'class' => 'form')) !!}

    <div class="form-group">
      
      {!! Form::label('Número Telefónico') !!}
      {!! Form::text('phone', null,
                     array('required',
                           'class' => 'form-control',
                           'placeholder' => 'Sólamente números')) !!}
    </div>

    <div class="form-group">
      {!! Form::label('Nombre') !!}
      {!! Form::text('name', null,
                     array('required',
                           'class' => 'form-control',
                           'placeholder' => '¿Cómo te gusta que te llamen?')) !!}
    </div>

    <div class="form-group">
      {!! Form::label('Tu contraseña') !!}
      {!! Form::password('password', 
                         array('class' => 'form-control',
                               'placeholder' => 'Sensible a mayúsculas y minúsculas',
                               'id' => 'password')) !!}
    </div>

    <div class="form-group">
      {!! Form::label('Repite tu contraseña') !!}
      {!! Form::password('passwordConfirmation', 
                         array('class' => 'form-control',
                               'placeholder' => 'Sensible a mayúsculas y minúsculas',
                               'id' => 'passwordConfirmation')) !!}
    </div>

    <div class="form-group">
      <p class="text-center">
      {!! Form::submit('Regístrame',
                       array('class' => 'btn btn-primary btn-large',
                             'id' => 'register')) !!}
      </p>
      <p class="text-center">
        <a href="login">¿Ya tienes cuenta? ¡Loguéate!</a>
      </p>
    </div>

    {!! Form::close() !!}

    @else
    <div class="alert alert-danger" role="alert" id="id"> 
      <p class="text-center">Ya tienes una cuenta.<br />
        Tu número telefónico es: <strong>{!! Auth::user()->phone !!}</strong></p>
    </div>
    @endif
  </div>
@stop
