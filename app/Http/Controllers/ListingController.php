<?php

namespace App\Http\Controllers;

use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
//shpw all listings
    public function index(){
    // return view('listings.index',[
    //     'listings'=>listing::latest()->filter(request(['tag','search']))->paginate(2),
    //     // 'listings'=>listing::all()
    // ]);
    return view('listings.index',[
        'listings'=>listing::latest()->filter(request(['tag','search']))->simplePaginate(6),
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
if($request->hasFile('logo')){
    $formFields['logo']=$request->file(key:'logo')->store('logos','public');
}
        listing::create($formFields);
       

        return redirect('/')->with('message','listing created successfully');


    }
    //show edit form

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing'=>$listing]);
    }
        //updatelisting data
       public function update(Request $request, Listing $listing){
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);
if($request->hasFile('logo')){
    $formFields['logo']=$request->file(key:'logo')->store('logos','public');
}
        $listing->update($formFields);
        

        return back()->with('message','listing updated successfully');


    }

}
