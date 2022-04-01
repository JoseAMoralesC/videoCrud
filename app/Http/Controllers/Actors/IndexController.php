<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Services\ActorService;
use Illuminate\Http\Request;
use App\Repositories\ActorRepository;
use Yajra\DataTables\DataTables;

class IndexController extends Controller{
    private $actorRepository;
    private $actorService;

    public function __construct(ActorRepository $actorRepository, ActorService $actorService){
        $this->actorRepository = $actorRepository;
        $this->actorService = $actorService;
    }

    public function index(){
        return view('Actors.index');
    }

    public function indexServerSite(Request $request){
        if($request->ajax()){
            $actors = $this->actorRepository->listActorById($request->get('id'));
            $data = $this->actorService->mounthDataActors($actors);
            return datatables()->of($data)->make(true);
        }
    }

}
