<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Translation\Dumper\IcuResFileDumper;

class FilmController extends Controller
{
    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listFilmsByYear($year = null)
    {
        $films_filtered = [];
        $title = "";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if (!is_null($year) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    public function listFilmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function sortFilmsByYear()
    {
        $sorted_films = [];

        $title = "Listado de Pelis Nuevas por año";
        $films = FilmController::readFilms();

        $sorted_films = collect($films)->sortByDesc("year");
        return view('films.list', ["films" => $sorted_films, "title" => $title]);
    }


    public function countFilms()
    {

        $title = "Numero de pelis en la base de datos";
        $films = FilmController::readFilms();

        $count = count($films);
        return view('films.count', ["count" => $count, "title" => $title]);
    }

    public function createFilm(Request $request)
    {
        $name = $request->input('name');
        if ($this->isFilm($name)) {
            return redirect("/")->with("error", "Esta pelicula ya esta registrada");
        }
        $year = $request->input('year');
        $genre = $request->input('genre');
        $country = $request->input('country');
        $img_url = $request->input('img_url');
        $duration = $request->input('duration');
        $films = [...$this->readFilms()];

        $film = [
            "name" => $name,
            "year" => $year,
            "genre" => $genre,
            "country" => $country,
            "img_url" => $img_url,
            "duration" => $duration,
        ];
        array_push($films, $film);
        Storage::put('/public/films.json',json_encode($films));
        return $this->listFilms();
    }

    private function isFilm($name)
    {
        $films = [...$this->readFilms()];
        foreach($films as $film){
            if($film["name"] == $name){
                return true;
            }
        }
        return false;
    }
}
