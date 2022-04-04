<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\MovieRepository;
use App\Services\MovieService;

class IndexController extends Controller{
    private $movieRepository;
    private $movieService;

    public function __construct(MovieRepository $movieRepository, MovieService $movieService){
        $this->movieRepository = $movieRepository;
        $this->movieService = $movieService;
    }

    public function index(){
        return view('index.index');
    }

    public function indexAJAX(Request $request){
        if($request->ajax()){
            $movies = $this->movieRepository->allMovies();
            $data = $this->movieService->mounthDataMoviesIndex($movies);

            return datatables()->of($data)->make(true);
        }
    }
}
