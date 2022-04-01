<?php

namespace App\Repositories;
use App\Models\Genre;

class GenreRepository{
    public function allGenres(){
        return Genre::all();
    }

    public function listGenreNameInArray(){
        return Genre::all()->pluck('name', 'id');
    }

    public function getById($id){
        return Genre::find($id);
    }

    public function insert($genre){
        return Genre::insert($genre);
    }

    public function update($genre, $data){
        return $genre->update($data);
    }

    public function delete($genre){
        return $genre->delete();
    }
}
