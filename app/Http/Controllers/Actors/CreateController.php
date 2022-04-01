<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;

class CreateController extends Controller{
    public function create(){
        return view('Actors.create');
    }

}
