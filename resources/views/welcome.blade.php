@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    @if (session('error'))
        <h2 class="text-danger">{{ session('error') }}</h2>
    @endif
    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul class="list-group">
        <li class="list-group-item"><a href="/filmout/oldFilms">Pelis antiguas</a></li>
        <li class="list-group-item"><a href="/filmout/newFilms">Pelis nuevas</a></li>
        <li class="list-group-item"><a href="/filmout/films">Pelis</a></li>
        <li class="list-group-item"><a href="/filmout/sortFilms">Pelis ordenadas por año</a></li>
        <li class="list-group-item"><a href="/filmout/filmsByYear">Buscar pelis por año</a></li>
        <li class="list-group-item"><a href="/filmout/filmsByGenre">Buscar pelis por genero</a></li>
        <li class="list-group-item"><a href="/filmout/countFilms">Contar peliculas</a></li>
    </ul>

    <form action="{{route('createFilm')}}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="name" value="Juan" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Año:</label>
            <input type="number" name="year" value="1999" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Género:</label>
            <input type="text" name="genre" value="Drama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>País:</label>
            <input type="text" name="country" value="Espana" class="form-control" required>
        </div>
        <div class="form-group">
            <label>URL:</label>
            <input type="text" name="img_url" value="https://images.wikidexcdn.net/mwuploads/wikidex/archive/f/f8/20080908162854%21Gengar.png" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Duración:</label>
            <input type="number" name="duration" value="180" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection