<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'nationality',
        'release',
        'duration'
    ];

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
