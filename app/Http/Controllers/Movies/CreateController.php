<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;

class CreateController extends Controller{
    private $actorRepository;

    public function __construct(ActorRepository $actorRepository){
        $this->actorRepository = $actorRepository;
    }

    public function create(){
        return view('Movies.create',[
            'actors' => $this->actorRepository->listActorNmaeInArray()
        ]);
    }
}
