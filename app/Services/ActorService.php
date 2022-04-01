<?php

namespace App\Services;
use App\Repositories\ActorRepository;
use Carbon\Carbon;

class ActorService{
    private $actorRepository;

    public function __construct(ActorRepository $actorRepository){
        $this->actorRepository = $actorRepository;
    }

    public function store($data){
        return $this->actorRepository->insert($data);
    }

    public function mounthDataActors($actors){
        $data = [];
        foreach ($actors as $actor){
            $data[] = [
                'id' => $actor->id,
                'name' => $actor->name,
                'last_name1' => $actor->last_name1,
                'last_name2' => $actor->last_name2,
                'birth_date' => Carbon::parse($actor->birth_date)->format('d/m/Y'),
                'acciones' => '',
            ];
        }
        return $data;
    }

    public function update($data, $id){
        $actor = $this->actorRepository->getById($id);
        if($actor != null) {
            return $this->actorRepository->update($actor, $data);
        }
        return 'Error, fallo al actualizar';
    }

    public function destroy($id){
        $actor = $this->actorRepository->getById($id);
        return $this->actorRepository->delete($actor);
    }
}
