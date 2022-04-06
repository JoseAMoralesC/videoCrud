<?php

namespace App\Services;

use App\Repositories\MovieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function listMovies($nat){
        return $this->movieRepository->listMovies($nat);
    }

    public function store($request){
        /*$requestData[] = [
            'title' => $request->get('title'),
            'synopsis' => $request->get('synopsis',null),
            'release' => $request->get('release'),
            'duration' => $request->get('duration'),
            'created_at' => null,
            'updated_at' => null,
            'image' => null,
            'nationality_id' => $request->get('nationality_id',null)
        ];*/
        $requestData = $request->except('_token');
        if($request->file('image') != null) $requestData['image'] = (string) $request->file('image')->store('public/IMG/movies');

        return $this->movieRepository->insert($requestData);
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
                'img' => asset($movie->image)
            ];
        }
        return $data;
    }

    public function mounthDataMoviesIndex($movies){
        $data = [];
        foreach($movies as $movie){
            $data[] = [
                'title' => $movie->title,
                'nationality' => isset($movie->nationalities) ? $movie->nationalities->name : null,
                'genres' => ($movie->genres != null ) ? $movie->genres : null,
                'actors' => ($movie->actors != null ) ? $movie->actors : '',
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
