<?php

namespace App\Repositories;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieRepository{
    public function allMovies(){
        return Movie::all();
    }

    public function allMoviesWithJoin(){
        return DB::table('movies')->
            join('actor_movie','movies.id','=','actor_movie.movie_id')->
            join('genre_movie','movies.id','=','genre_movie.movie_id')->
            join('nationalities','movies.nationality_id','=','nationalities.id');
    }

    public function getById($id){
        return Movie::find($id);
    }

    public function insert($movie){
        $mov = Movie::create($movie);
        if(isset($movie['actor'])){
            $mov->actors()->sync($movie['actor']);
        }

        if(isset($data['genre'])){
            $mov->genres()->sync($movie['genre']);
        }

        return true;
    }

    public function update($movie, $data){
        $movie->update($data);
        if(isset($data['actor'])){
            $movie->actors()->sync($data['actor']);
        }

        if(isset($data['genre'])){
            $movie->genres()->sync($data['genre']);
        }
        return true;
    }

    public function delete($movie){
        return $movie->delete();
    }
}
