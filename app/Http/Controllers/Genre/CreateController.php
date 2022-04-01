<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GenreRepository;

class CreateController extends Controller{
    public function create(){
        return view('Genres.create');
    }
}
