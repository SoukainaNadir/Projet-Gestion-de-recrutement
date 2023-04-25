<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class candidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('cv.show');
    }

}
