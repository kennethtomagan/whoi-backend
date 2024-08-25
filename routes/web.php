<?php

use App\Http\Controllers\Domain\DomainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

