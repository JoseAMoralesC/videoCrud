<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class EditController extends Controller{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository){
        $this->movieRepository = $movieRepository;
    }

    public function edit($id){
        return view('Movies.edit', [
            'movie' => $this->movieRepository->getById($id)
        ]);
    }

}
