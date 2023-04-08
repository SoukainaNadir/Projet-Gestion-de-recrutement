<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FindjobController extends Controller
{
    public function index(){
        $offers = Job::all();
        $offers =Job::latest()->paginate(10);
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
    public function showOffer($id)
{
    $offer = Job::findOrFail($id);
    return view('offers.show', compact('offer'));
}

    public function store(JobRequest $request){
    
        if($request->has('image')){
            $file=$request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads') ,$image_name);
            
        }
        
        Job::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'slug'=>Str::slug($request->title),
            'location'=>$request->location,
            'salary'=>$request->salary,
            'jobtype'=>$request->jobtype,
            'image'=> $image_name,
        ]);

        return redirect()->route('offers')->with([
            'success' =>'Congratulations! Your job offer has been added successfully'
        ]);
        
    }

    public function edit($slug){
        $offer = Job::where('slug',$slug)->first();
        return view ('edit')->with([
            'offer' =>$offer
        ]);
    }

    public function update(JobRequest $request, $slug){
        $offer = Job::where('slug',$slug)->first();
        $offer->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'slug'=>Str::slug($request->title),
            'location'=>$request->location,
            'salary'=>$request->salary,
            'jobtype'=>$request->jobtype,
            'image'=> "https://via.placeholder.com/640x480.png/00cc88?text=quia = new offer",
            

        ]);
        return redirect()->route('offers')->with([
            'success' =>'Congratulations! Your job offer has been updated successfully'
        ]);
    }

    public function delete($slug){
        $offer = Job::where('slug',$slug)->first();
        $offer->delete();
        return redirect()->route('offers')->with([
            'success' =>'Your offer has been deleted successfully'
        ]);
    }




}
