<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FindjobController extends Controller
{
    public function index(){
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
}
