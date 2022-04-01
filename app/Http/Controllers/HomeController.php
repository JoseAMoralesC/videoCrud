<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\ActorMovie;

class HomeController extends Controller{
    public function index(){
        return view('index');
    }
}
