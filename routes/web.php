<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\RequestControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/',[CardController::class],)

Route::get('/',[Web::class,'home'])->name('home');


Route::post('/search',[RequestControllers::class,'search'])->name('search');
