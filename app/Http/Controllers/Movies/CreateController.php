<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Repositories\NationalityRepository;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;
use App\Repositories\GenreRepository;

class CreateController extends Controller{
    private $actorRepository;
    private $genreRepository;
    private $nationalityRepository;

    public function __construct(
        ActorRepository $actorRepository,
        GenreRepository $genreRepository,
        NationalityRepository $nationalityRepository
    ){
        $this->actorRepository = $actorRepository;
        $this->genreRepository = $genreRepository;
        $this->nationalityRepository = $nationalityRepository;
    }

    public function create(){
        return view('Movies.create',[
            'actors' => $this->actorRepository->listActorNameInArray(),
            'genres' => $this->genreRepository->listGenreNameInArray(),
            'nationalities' => $this->nationalityRepository->listInArray()
        ]);
    }
}
