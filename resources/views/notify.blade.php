@extends('layout')

@section('content')

  @foreach($expired_products as $expired)
    <p>{{ $expired->expiration_date }}</p>
  @endforeach

  <p class="text-danger">that seems so expired pal!! you should clean it up</p>

@stop
