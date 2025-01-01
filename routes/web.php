<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
//create form to store new listing
//show to show one index
//destroy


Route::get('/',[ListingController::class ,'index']);


//show ceate form
Route::get('/listings/create', [ListingController::class, 'create']);

//store
Route::post('/listings', [ListingController::class,'store']);

//shpw edit form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
Route::get('/listings/{listing}', [ListingController::class,'show']);





