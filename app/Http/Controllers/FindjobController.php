<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FindjobController extends Controller
{
    public function index(){
        $offers =[
            [
            'id'=>1,
            'title'=>'poste title 1',
            'description'=>'post body 1'
            ],  
            [
                'id'=>2,
                'title'=>'poste title 2',
                'description'=>'post body 2'
            ],  
            [
                'id'=>3,
                'title'=>'poste title 3',
                'description'=>'post body 3'
                ],  
            
            ];
        return view ('FindJob')->with([
            'offers' =>$offers
        ]);
    }
}
