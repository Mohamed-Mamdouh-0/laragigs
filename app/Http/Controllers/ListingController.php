<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index',['listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)]);
    }
    // show single list
    public function show(Listing $listing){
        return view('listings.show',['listing'=> $listing]);
    }
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){
        $formFields= $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => ''
            
        ]);

        Listing::create($formFields);
        return redirect('/')->with('message','Listing created successfully');
    }
}
