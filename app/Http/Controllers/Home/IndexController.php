<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\ActorMovie;
use App\Http\Controllers\Controller;

class IndexController extends Controller{
    public function index(){
        return view('index');
    }
}
