<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Repositories\ActorRepository;
use App\Repositories\GenreRepository;
use App\Repositories\NationalityRepository;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class Edit2Controller extends Controller{
    private $movieRepository;
    private $actorRepository;
    private $genreRepository;
    private $nationalityRepository;

    public function __construct(
        MovieRepository $movieRepository,
        ActorRepository $actorRepository,
        GenreRepository $genreRepository,
        NationalityRepository $nationalityRepository
    ){
        $this->movieRepository = $movieRepository;
        $this->actorRepository = $actorRepository;
        $this->genreRepository = $genreRepository;
        $this->nationalityRepository = $nationalityRepository;
    }

    public function edit($id){
       return view('Movies.edit2.edit2',[
           'rutaMovies' => route('movies.editMovies2', $id),
           'rutaActors' => route('movies.editActorList2', $id),
           'rutaGenres' => route('movies.editGenreList2', $id),
       ]);
    }

    public function editMovies($id){
        return view('Movies.edit2.movies', [
            'movie' => $this->movieRepository->getById($id),
            'actors' => $this->actorRepository->listActorNameInArray(),
            'genres' => $this->genreRepository->listGenreNameInArray(),
            'nationalities' => $this->nationalityRepository->listInArray()
        ])->render();
    }

    public function loadListActors($id){
        return view('Movies.edit2.listActors2', [
            'movie' => $this->movieRepository->getById($id),
        ])->render();
    }

    public function loadListGenres($id){
        return view('Movies.edit2.listGenres2', [
            'movie' => $this->movieRepository->getById($id),
        ])->render();
    }

}
