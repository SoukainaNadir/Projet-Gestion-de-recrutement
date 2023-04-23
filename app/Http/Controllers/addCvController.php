<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;


class addCvController extends Controller
{
    //
    public function index()
    {
        $cvs = Cv::where('user_id', auth()->user()->id)->get();
        return view('showCv', compact('cvs'));
    }

    public function create(){
        return view('createCv');
    }

    public function store(Request $request)
{
    $user = auth()->user();

    // Check if the user already has a CV
    if ($user->cvs()->exists()) {
        return redirect()->back()->withErrors(['You have already created a CV.']);
    }

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'education' => 'nullable|string|max:65535',
        'experience' => 'nullable|string|max:65535',
        'skills' => 'nullable|string|max:65535',
        'interests' => 'nullable|string|max:65535',
        'profil' => 'nullable|string|max:65535',
        'languages' => 'nullable|string|max:65535',
        'headline' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $cv = new Cv();
    if($request->has('image')){
        $file=$request->image;
        $image_name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads') ,$image_name);
    }

    $cv->name = $validatedData['name'];
    $cv->email = $validatedData['email'];
    $cv->phone = $validatedData['phone'];
    $cv->address = $validatedData['address'];
    $cv->education = $validatedData['education'];
    $cv->experience = $validatedData['experience'];
    $cv->skills = $validatedData['skills'];
    $cv->interests = $validatedData['interests'];
    $cv->languages = $validatedData['languages'];
    $cv->headline = $validatedData['headline'];
    $cv->profil = $validatedData['profil'];
    $cv->image=$image_name;


    $cv->user_id = auth()->user()->id;


    $cv->save();

    return redirect()->route('successCv')
                    ->with('success','CV created successfully.');
}

public function edit(Cv $cv)
{
    return view('cv.edit', compact('cv'));
}

public function update(Request $request, Cv $cv)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:cvs,email,' ,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'education' => 'nullable|string',
        'experience' => 'nullable|string',
        'skills' => 'nullable|string',
        'interests' => 'nullable|string',
    ]);

    $cv->update($validatedData);

    return redirect()->route('cv.show', $cv)->with('success', 'CV updated successfully');
}

}
