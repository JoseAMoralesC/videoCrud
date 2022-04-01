<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActorService;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller{
    private $actorService;

    public function __construct(ActorService $actorService){
        $this->actorService = $actorService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->actorService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            dd($e);
        }

        return redirect()->route('actors.index');
    }

}
