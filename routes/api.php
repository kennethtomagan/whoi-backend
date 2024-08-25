<?php

use App\Http\Controllers\Domain\DomainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/domain-data", DomainController::class);