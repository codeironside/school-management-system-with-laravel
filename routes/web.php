<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
//create form to store new listing
//show to show one index
//index to show all
//create to show form to create new llisting
//store - store new item
//edit - show form to edit
//update - update item
//destroy- delete item 



Route::get('/',[ListingController::class ,'index']);


//show ceate form
Route::get('/listings/create', [ListingController::class, 'create']);

//store
Route::post('/listings', [ListingController::class,'store']);

//shpw edit form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//update listing
Route::put('/listings/{listing}/edit', [ListingController::class, 'update']);
Route::get('/listings/{listing}', [ListingController::class,'show']);







