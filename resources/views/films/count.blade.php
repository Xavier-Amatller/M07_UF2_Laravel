@extends('layouts.app')

@section('title', 'count')

@section('content')
    <h1>El numero total de peliculas es: {{ $count }}</h1>
@endsection
