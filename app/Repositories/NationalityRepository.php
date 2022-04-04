<?php

namespace App\Repositories;
use App\Models\Nationality;

class NationalityRepository extends Nationality{
    public function listInArray(){
        return Nationality::all()->pluck('name', 'id');
    }
}
