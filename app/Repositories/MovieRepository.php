<?php

namespace App\Repositories;
use App\Models\Movie;

class MovieRepository{
    public function allMovies(){
        return Movie::all();
    }

    public function getById($id){
        return Movie::find($id);
    }

    public function insert($movie){
        return Movie::insert($movie)->sync($movie->acotr);
    }

    public function update($actor, $data){
        return $actor->update($data);
    }

    public function delete($movie){
        return $movie->delete();
    }
}
