<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Services\GenreService;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller{
    private $genreService;

    public function __construct(GenreService $genreService){
        $this->genreService = $genreService;
    }
    public function destroy($id){

        try{
            DB::connection()->beginTransaction();
            $this->genreService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            dd($e);
        }

        return redirect()->route('genres.index');
    }

}
