<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;
use App\Services\MovieService;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller{
    private $movieService;

    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;
    }

    public function destroy($id){

        try{
            DB::connection()->beginTransaction();
            $this->movieService->destroy($id);
            DB::connection()->commit();
        }catch (\Exception $e){
            DB::connection()->rollBack();
        }

        return redirect()->route('movies.index');
    }

}
