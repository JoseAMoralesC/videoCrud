<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GenreRepository;

class EditController extends Controller{
    private $genreRepository;

    public function __construct(GenreRepository $genreRepository){
        $this->genreRepository = $genreRepository;
    }

    public function edit($id){
        return view('Genres.edit', [
            'genre' => $this->genreRepository->getById($id)
        ]);
    }

}
