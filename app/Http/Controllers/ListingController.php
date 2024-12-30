<?php

namespace App\Http\Controllers;

use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
//shpw all listings
    public function index(){
    $tags =request()->tag;
    return view('listings.index',[
        'listings'=>listing::latest()->filter(request(['tag','search']))->get(),
        // 'listings'=>listing::all()
    ]);
    }

    //show singlw listing
    public function show(Listing $listing){
    return view('listings.show', [
        'listing' => $listing

    ]);
    }
    public function create(){
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request){
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        listing::create($formFields);

        return redirect('/');

    }

}
