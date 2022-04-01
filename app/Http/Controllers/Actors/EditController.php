<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;

class EditController extends Controller{
    private $actorRepository;

    public function __construct(ActorRepository $actorRepository){
        $this->actorRepository = $actorRepository;
    }

    public function edit($id){
        return view('Actors.edit', [
            'actor' => $this->actorRepository->getById($id)
        ]);
    }

}
