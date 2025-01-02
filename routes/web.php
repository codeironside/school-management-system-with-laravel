<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
//create form to store new listing
//show to show one index
//index to show all
//create to show form to create new llisting
//store - store new item
//edit - show form to edit
//update - update item
//destroy- delete item 

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

Route::get('/', [ListingController::class, 'index']);


//show ceate form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//store
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//shpw edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
;

//update listing
Route::put('/listings/{listing}/edit', [ListingController::class, 'update'])->middleware('auth');
;


//delete item
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
;


//show one listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//show REgister/create user

Route::get('/register', [UserController::class, 'create'])->middleware('guest');


//create new user

Route::post('/users', [UserController::class, 'store'])
;



//log user out

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
;



//show login form

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


//login user


Route::post('/users/authenticate', [Usercontroller::class, 'authenticate']);

//manage Listings








