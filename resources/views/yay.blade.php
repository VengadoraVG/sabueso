@extends('layout')

@section('content')
  <p class="text-center">
    @if(Auth::check())
      <p>YAY! estás logueado con el número <strong>{!! Auth::user()->phone !!}</strong></p>
      <p><a href="spam"><button type="button" class="btn btn-default">MÁNDAME SPAM!!</button></a></p>
    @else
      No estás logueado :(
    @endif
  </p>
@stop
