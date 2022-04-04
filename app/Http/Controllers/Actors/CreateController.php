<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Repositories\NationalityRepository;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;

class CreateController extends Controller{
    private $nationalityRepository;

    public function __construct(NationalityRepository $nationalityRepository){
        $this->nationalityRepository = $nationalityRepository;
    }
    public function create(){
        return view('Actors.create',[
            'nationalities' => $this->nationalityRepository->listInArray()
        ]);
    }

}
