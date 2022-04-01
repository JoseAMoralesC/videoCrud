<?php

namespace App\Repositories;
use App\Models\Actor;
use Illuminate\Support\Facades\DB;

class ActorRepository{
    public function allActors(){
        return Actor::all();
    }

    public function add50kElements(){
       /* for($i=0;$i < 50000; $i++){
            $actor = new Actor();
            $actor->name = "Jose";
            $actor->last_name1 = "Morales";
            $actor->last_name2 = "Coll";
            $actor->birth_date = date_create("1994-10-13");
            $actor->save();
        }*/
    }

    public function listActorById($id){
        $actor = Actor::query();
        if($id != null){
            $actor->whereIn('id',$id);
        }
        return $actor->get();
    }

    public function listActorNmaeInArray(){
        return DB::table('actors')->select(DB::raw('concat_ws(" ",name,last_name1,last_name2) as surname, id'))->pluck('surname', 'id');
    }

    public function getById($id){
        return Actor::find($id);
    }

    public function insert($data){
        return Actor::insert($data);
    }

    public function update($actor, $data){
        return $actor->update($data);
    }

    public function delete($actor){
        return $actor->delete();
    }
}
