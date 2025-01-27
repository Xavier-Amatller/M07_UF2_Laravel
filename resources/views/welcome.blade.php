@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/films>Pelis</a></li>
        <li><a href=/filmout/sortFilms>Pelis ordenadas por año</a></li>
        <li><a href=/filmout/filmsByYear>Buscar pelis por año</a></li>
        <li><a href=/filmout/filmsByGenre>Buscar pelis por genero</a></li>
        <li><a href=/filmout/countFilms>Contar peliculas</a></li>

    </ul>

    <form action="/filmin/createFilm" method="POST">
        Nombre: <input type="text" name="name" required><br>
        Año: <input type="number" name="year" required><br>
        Genero: <input type="text" name="gender" required><br>
        Pais: <input type="text" name="country" required><br>
        Duracion: <input type="number" name="duration" required><br>
        Url: <input type="text" name="url" required><br>
        <input type="submit" value="Enviar">
    </form>

    @if (!empty($errorMessage))
        <FONT COLOR="red">No se ha podido crear la película</FONT>
    @endif
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->


@endsection
