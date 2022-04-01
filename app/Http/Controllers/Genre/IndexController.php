<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Services\GenreService;
use Illuminate\Http\Request;
use App\Repositories\GenreRepository;

class IndexController extends Controller{
    private $genreRepository;
    private $genreService;

    public function __construct(GenreRepository $genreRepository, GenreService $genreService){
        $this->genreRepository = $genreRepository;
        $this->genreService = $genreService;
    }

    public function index(){
        return view('Genres.index', [
            'genres' => $this->genreRepository->allGenres()
        ]);
    }

    public function indexServerSite(Request $request){
        if($request->ajax()){
            $genres = $this->genreRepository->allGenres();
            $data = $this->genreService->mounthDataGenres($genres);
            return datatables()->of($data)->make(true);
        }
    }

}
