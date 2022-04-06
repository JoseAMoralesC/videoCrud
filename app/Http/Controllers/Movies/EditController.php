<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Repositories\ActorRepository;
use App\Repositories\GenreRepository;
use App\Repositories\NationalityRepository;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class EditController extends Controller{
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
        return view('Movies.edit.edit', [
            'movie' => $this->movieRepository->getById($id),
            'actors' => $this->actorRepository->listActorNameInArray(),
            'genres' => $this->genreRepository->listGenreNameInArray(),
            'nationalities' => $this->nationalityRepository->listInArray()
        ]);
    }

    public function loadListActors($id){
        return view('Movies.edit.listActors', [
            'movie' => $this->movieRepository->getById($id),
        ]);
    }

    public function loadListGenres($id){
        return view('Movies.edit.listGenres',[
            'movie' => $this->movieRepository->getById($id),
        ]);
    }

}
