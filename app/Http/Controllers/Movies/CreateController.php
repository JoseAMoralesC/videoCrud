<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;
use App\Repositories\GenreRepository;

class CreateController extends Controller{
    private $actorRepository;
    private $genreRepository;

    public function __construct(ActorRepository $actorRepository,  GenreRepository $genreRepository){
        $this->actorRepository = $actorRepository;
        $this->genreRepository = $genreRepository;
    }

    public function create(){
        return view('Movies.create',[
            'actors' => $this->actorRepository->listActorNameInArray(),
            'genres' => $this->genreRepository->listGenreNameInArray()
        ]);
    }
}
