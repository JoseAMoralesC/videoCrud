<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MovieService;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller{
    private $movieService;

    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'release' => 'required',
            'duration' => 'required'
        ]);

        $dataRequest = $request->except('_token','_method');

        try{
            DB::connection()->beginTransaction();
            $this->movieService->update($dataRequest, $id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            dd($e);
        }

        return redirect()->route('movies.index');
    }
}
