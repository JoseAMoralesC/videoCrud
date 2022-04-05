<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Repositories\NationalityRepository;
use App\Services\MovieService;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller{
    private $movieRepository;
    private $movieService;
    private $nationalityRepository;

    public function __construct(
        MovieRepository $movieRepository,
        MovieService $movieService,
        NationalityRepository $nationalityRepository
    ){
        $this->movieRepository = $movieRepository;
        $this->movieService = $movieService;
        $this->nationalityRepository = $nationalityRepository;
    }

    public function index(Request $request){

        return view('Movies.index', array(
            'data' => array(
                'nationalities' => $this->nationalityRepository->listInArray(),
                'filter' => array(
                    'nationalities' => $request->get('nationality_id',null)
                )
            )
        ));
    }

    public function indexJoin(){
        return view('Movies.index', [
            'movie' => $this->movieRepository->allMoviesWithJoin()
        ]);
    }

    public function indexServerSite(Request $request){
        if($request->ajax()){
            $movies = $this->movieRepository->listMovies($request->get('nationality_id',null));
            $data = $this->movieService->mounthDataMovies($movies);
            return datatables()->of($data)->make(true);
        }
    }

}
