<?php

namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService{
    private $genreRepository;

    public function __construct(GenreRepository $genreRepository){
        $this->genreRepository = $genreRepository;
    }

    public function store($data){
        return $this->genreRepository->insert($data);
    }

    public function mounthDataGenres($genres){
        $data = [];
        foreach($genres as $genre){
            $data[] = [
                'id' => $genre->id,
                'name' => $genre->name,
            ];
        }
        return $data;
    }

    public function update($data, $id){
        $genre = $this->genreRepository->getById($id);
        return $this->genreRepository->update($genre, $data);
    }

    public function destroy($id){
        $genre = $this->genreRepository->getById($id);
        return $this->genreRepository->delete($genre);
    }

}
