<?php

namespace App\Http\Controllers;

use App\Models\Coverletter;
use Illuminate\Http\Request;

class CoverletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coverletters = Coverletter::where('user_id', auth()->user()->id)->get();
        return view('showCL', compact('coverletters'));
    }

    public function create()
    {
        return view('createCL');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Check if the user already has a CV
        if ($user->coverletters()->exists()) {
            return redirect()->back()->withErrors(['You have already created a Cover Letter.']);
        }
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required',
        ]);

        $coverletter = new Coverletter();
        $coverletter->name = $validatedData['name'];
        $coverletter->email = $validatedData['email'];
        $coverletter->headline = $request->input('headline');
        $coverletter->phone = $request->input('phone');
        $coverletter->address = $request->input('address');
        $coverletter->object = $request->input('object');
        $coverletter->content = $validatedData['content'];
        $coverletter->user_id = auth()->user()->id;
        $coverletter->save();

        return redirect()->route('successCv')
                    ->with('success1','Cover Letter created successfully.');
    }

    public function edit(Coverletter $coverletter)
{
    // Only allow the CV owner to edit
    if ($coverletter->user_id != auth()->user()->id) {
        return redirect()->back()->withErrors(['You are not authorized to edit this CV.']);
    }

    return view('editCL', compact('coverletter'));
}
    public function update(Request $request, Coverletter $coverletter)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'headline' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'object' => 'required|string|max:255',
        'content' => 'nullable|string|max:65535',

    ]);

    // Only allow updating the CV if the user owns it
    if ($coverletter->user_id !== auth()->user()->id) {
        return redirect()->back()->withErrors(['You do not have permission to update this Cover Letter.']);
    }



    $coverletter->name = $validatedData['name'];
    $coverletter->email = $validatedData['email'];
    $coverletter->phone = $validatedData['phone'];
    $coverletter->address = $validatedData['address'];
    $coverletter->headline = $validatedData['headline'];
    $coverletter->content = $validatedData['content'];
    $coverletter->object = $validatedData['object'];

    $coverletter->save();

    return redirect()->route('coverletters.show')
                    ->with('success','Cover Letter updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Coverletter $coverletter)
{
    // Only allow deleting the Coverletter if the user owns it
    if ($coverletter->user_id !== auth()->user()->id) {
        return redirect()->back()->withErrors(['You do not have permission to delete this Cover Letter.']);
    }

    $coverletter->delete();

    return redirect()->route('coverletters.show')
                    ->with('success','Cover Letter deleted successfully.');
}

}
