<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MovieService;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller{
    private $movieService;

    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'release' => 'required',
            'nationality' => 'required',
            'duration' => 'required'
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->movieService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            dd($e);
        }
        return redirect()->route('movies.index');
    }

}
