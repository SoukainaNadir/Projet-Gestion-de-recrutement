<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FindjobController extends Controller
{
    public function index(){
        $offers = Job::all();
        $offers =Job::paginate(6);
        return view ('FindJob')->with([
            'offers' =>$offers
        ]);
    }
    public function show($slug ){
        $offer = Job::where('slug',$slug)->first();
        return view ('show')->with([
            'offer' =>$offer
        ]);
    }

    public function store(Request $request ){

        $offer = new Job();
        $offer->title = $request->title;
        $offer->slug = Str::slug($request->title);
        $offer->description = $request->description;
        $offer->location = $request->location;
        $offer->salary = $request->input('salary'); 
        $offer->jobtype = $request->jobtype;
        $offer->image = "https://via.placeholder.com/640x480.png/00cc88?text=quia = new offer";
        $offer->save(); 
        
    }
}
