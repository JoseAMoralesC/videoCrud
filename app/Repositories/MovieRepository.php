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
        $mov = Movie::create($movie);
        $mov->actors()->sync($movie['actor']);
        return $mov->genres()->sync($movie['genre']);
    }

    public function update($movie, $data){
        $movie->update($data);
        $movie->actors()->sync($movie['actor']);
        return $movie->genres()->sync($movie['genre']);
    }

    public function delete($movie){
        return $movie->delete();
    }
}
