<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActorService;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    private $actorService;

    public function __construct(ActorService $actorService)
    {
        $this->actorService = $actorService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name1' => 'required',
            'birth_date' => 'required'
        ]);

        $dataRequest = $request->except('_token');


        try {
            DB::connection()->beginTransaction();
            $this->actorService->store($dataRequest);
            DB::connection()->commit();
        } catch (\Exception $e) {
            DB::connection()->rollBack();
            \Log::info($e);
            dd('Error al insertar....');
        }

        return redirect()->route('actors.index');
    }
}
