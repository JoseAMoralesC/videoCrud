<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActorService;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller{
    private $actorService;

    public function __construct(ActorService $actorService){
        $this->actorService = $actorService;
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'last_name1' => 'required',
            'birth_date' => 'required'
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->actorService->update($dataRequest, $id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            dd($e);
        }

        return redirect()->route('actors.index');
    }
}
