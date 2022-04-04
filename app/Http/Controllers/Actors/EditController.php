<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Repositories\NationalityRepository;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;

class EditController extends Controller{
    private $actorRepository;
    private $nationalityRepository;

    public function __construct(
        ActorRepository $actorRepository,
        NationalityRepository $nationalityRepository
    ){
        $this->actorRepository = $actorRepository;
        $this->nationalityRepository = $nationalityRepository;
    }

    public function edit($id){
        return view('Actors.edit', [
            'actor' => $this->actorRepository->getById($id),
            'nationalities' => $this->nationalityRepository->listInArray()
        ]);
    }

}
