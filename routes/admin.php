<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('',[Admin\HomeController::class, 'index']);
