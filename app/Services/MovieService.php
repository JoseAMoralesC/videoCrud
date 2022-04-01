<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository){
        $this->movieRepository = $movieRepository;
    }

    public function store($data){
        return $this->movieRepository->insert($data);
    }

    public function mounthDataMovies($movies){
        $data = [];
        foreach ($movies as $movie){
            $data[] = [
                'id' => $movie->id,
                'title' => $movie->title,
                'synopsis' => $movie->synopsis,
                'nationality' => $movie->nationality,
                'release' => $movie->release,
                'duration' => $movie->duration,
            ];
        }
        return $data;
    }

    public function update($data, $id){
        $actor = $this->movieRepository->getById($id);
        return $this->movieRepository->update($actor,$data);
    }

    public function destroy($id){
        $movie = $this->movieRepository->getById($id);
        return $this->movieRepository->delete($movie);
    }
}
