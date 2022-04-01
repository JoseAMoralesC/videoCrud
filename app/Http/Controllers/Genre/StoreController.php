<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GenreService;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller{
    private $genreService;

    public function __construct(GenreService $genreService){
        $this->genreService = $genreService;
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->genreService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            dd($e);
        }

        return redirect()->route('genres.index');
    }

}
