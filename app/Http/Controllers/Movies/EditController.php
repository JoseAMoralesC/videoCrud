<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Repositories\ActorRepository;
use App\Repositories\GenreRepository;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class EditController extends Controller{
    private $movieRepository;
    private $actorRepository;
    private $genreRepository;

    public function __construct(MovieRepository $movieRepository, ActorRepository $actorRepository, GenreRepository $genreRepository){
        $this->movieRepository = $movieRepository;
        $this->actorRepository = $actorRepository;
        $this->genreRepository = $genreRepository;
    }

    public function edit($id){
        return view('Movies.edit', [
            'movie' => $this->movieRepository->getById($id),
            'actors' => $this->actorRepository->listActorNameInArray(),
            'genres' => $this->genreRepository->listGenreNameInArray()
        ]);
    }

}
