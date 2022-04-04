<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository){
        $this->movieRepository = $movieRepository;
    }

    /*public function store($data){
        foreach($data as $i=>$val){
            if($i != 'actor'){
                $movie[$i] = $val;
            }else{
                $actor = array_map(null,$val);
            }
        }
        return $this->movieRepository->insert($movie,$actor);
    }*/

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
                'nationality' => ($movie->nationalities != null) ? $movie->nationalities->name : '',
                'release' => $movie->release,
                'duration' => $movie->duration,
            ];
        }
        return $data;
    }

    public function mounthDataMoviesIndex($movies){
        $data = [];
        foreach($movies as $movie){
            $genres = [];
            $actors = [];
            if($movie->genres != null ){
                foreach($movie->genres as $genre){
                    array_push($genres, $genre->name);
                }
            }

                $data[] = [
                'title' => $movie->title,
                'nationality' => isset($movie->nationalities) ? $movie->nationalities->name : null,
                'genres' => ($movie->genres != null ) ? $movie->genres : null,
                'actors' => ($movie->actors != null ) ? $movie->actors : '',
                'release' => $movie->release,
                'duration' => $movie->duration
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
