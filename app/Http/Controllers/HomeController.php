<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('Home');
    }

    public function create(Request $request){
        $this->authorize('create', User::class, ['message' => 'You must have a recruiter account to create a job.']);
        return view ('create');
    }
}
