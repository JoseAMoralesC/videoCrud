<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;

class ShowController extends Controller{
    private $actorRepository;

    public function __construct(ActorRepository $actorRepository){
        $this->actorRepository = $actorRepository;
    }

    public function show($id){
        return view('Actors.show', [
            'actor' => $this->actorRepository->getById($id)
        ]);
    }

}
