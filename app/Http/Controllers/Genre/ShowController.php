<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GenreRepository;

class ShowController extends Controller{
    private $genreRepository;

    public function __construct(GenreRepository $genreRepository){
        $this->genreRepository = $genreRepository;
    }

    public function show($id){
        return view('Genres.show', [
            'genre' =>  $this->genreRepository->getById($id)
        ]);
    }

}
