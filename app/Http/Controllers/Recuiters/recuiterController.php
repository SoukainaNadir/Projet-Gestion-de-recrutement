<?php

namespace App\Http\Controllers\Recuiters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class recuiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
{
    // check if the user is a recuiter
        if(auth()->user()->role_id !== 2) {
            abort(403, 'Unauthorized action.');
        }
    
    // if the user is a recuiter, continue with creating the offer
        return view('offer.create');
}


}
