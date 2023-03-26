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
}
