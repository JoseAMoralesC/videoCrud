<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    public function actors(){
        return $this->hasMany(Actor::class);
    }

    public function movies(){
        return $this->hasMany(Movie::class, 'nationality_id','id');
    }
}
