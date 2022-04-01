<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Services\MovieService;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;


class IndexController extends Controller{
    private $movieRepository;
    private $movieService;

    public function __construct(MovieRepository $movieRepository, MovieService $movieService){
        $this->movieRepository = $movieRepository;
        $this->movieService = $movieService;
    }

    public function index(){
        $movies['movie'] = $this->movieRepository->allMovies();
        return view('Movies.index', $movies);
    }

    public function indexServerSite(Request $request){
        if($request->ajax()){
            $movies = $this->movieRepository->allMovies();
            $data = $this->movieService->mounthDataMovies($movies);
            return datatables()->of($data)->make(true);
        }
    }

}
