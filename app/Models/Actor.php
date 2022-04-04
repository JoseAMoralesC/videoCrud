<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name1',
        'last_name2',
        'birth_date'
    ];

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }

    public function nationalities(){
        return $this->hasOne(Nationality::class);
    }
}
