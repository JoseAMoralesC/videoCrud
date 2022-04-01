<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class ShowController extends Controller{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository){
        $this->movieRepository = $movieRepository;
    }

    public function show($id){
        return view('Movies.show',[
            'movie' => $this->movieRepository->getById($id)
        ]);
    }

}
