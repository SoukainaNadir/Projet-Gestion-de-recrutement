<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\ApplyForJob;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
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

    public function store(JobRequest $request):RedirectResponse
    {
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
            'start_date'=>$request->start_date,
            'expired_date'=>$request->expired_date,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('offers')->with([
            'success' =>'Congratulations! Your job offer has been added successfully'
        ]);

    }

    public function edit($slug){
        $offer = Job::where('slug',$slug)->first();
        return view ('Edit')->with([
            'offer' =>$offer
        ]);
    }

    public function update(JobRequest $request, $slug){
        $offer = Job::where('slug',$slug)->first();
        if($request->has('image')){
            $file=$request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
            unlink(public_path('uploads').'/'.$offer->image);
            $offer->image= $image_name;
        }

        $offer->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'slug'=>Str::slug($request->title),
            'location'=>$request->location,
            'salary'=>$request->salary,
            'jobtype'=>$request->jobtype,
            'image'=> $offer->image,
            'start_date'=>$offer->start_date,
            'expired_date'=>$offer->expired_date,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('offers')->with([
            'success' =>'Congratulations! Your job offer has been updated successfully'
        ]);
    }

    public function delete($slug){
        $offer = Job::where('slug',$slug)->first();
        unlink(public_path('uploads').'/'.$offer->image);
        $offer->delete();
        return redirect()->route('offers')->with([
            'success' =>'Your offer has been deleted successfully'
        ]);
    }

    public function applyJobSave(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'title' => 'required',
        'CoverLetterfile' => 'nullable|file|mimes:pdf',
        'CVfile' => 'nullable|file|mimes:pdf',
        'ExCv' => 'nullable|string',
        'ExCl' => 'nullable|string',

    ]);

    $fileNameCv = '';
    $fileNameCl = '';
    if ($request->hasFile('CVfile')) {
        $fileNameCv = time() . '_' . $request->file('CVfile')->getClientOriginalName();
        $request->file('CVfile')->storeAs('public/cvs', $fileNameCv);


    if ($request->hasFile('CoverLetterfile')) {
        $fileNameCl = time() . '_' . $request->file('CoverLetterfile')->getClientOriginalName();
        $request->file('CoverLetterfile')->storeAs('public/cover-letters', $fileNameCl);
    }

    $jobApplication = new ApplyForJob();
    $jobApplication->name = $validatedData['name'];
    $jobApplication->email = $validatedData['email'];
    $jobApplication->title = $validatedData['title'];
    $jobApplication->CVfile = $fileNameCv;
    $jobApplication->CoverLetterfile = $fileNameCl;
    $validatedData['slug'] = Str::slug($validatedData['title']);
    $jobApplication->user_id = auth()->user()->id;
    $jobApplication->save();

    return redirect()->back()->with('success', 'Your job application has been submitted successfully.');
}
}

public function jobApplicants($title)
{

    $apply_for_jobs=DB::table('apply_for_jobs')->where('title',$title)->get();
    return view('candidates',compact('apply_for_jobs'));
}

public function downloadCv($id)
{
    $CVfile = ApplyForJob::where('id', $id)->first();
    $filepath = public_path("storage/cvs/{$CVfile->CVfile}");
    return response()->download($filepath);
}
public function downloadCl($id)
{
    $CoverLetterfile = ApplyForJob::where('id', $id)->first();
    $filepath = public_path("storage/cvs/{$CoverLetterfile->CoverLetterfile}");
    return response()->download($filepath);
}

public function manageOffers()
{
    return view('manage_offers');
}

public function search(Request $request)
{

    $search = $request->input('search');

    $offers = Job::query()
        ->where('title', 'LIKE', "{$search}%")
        ->get();

    return view('search',['offers' => $offers, 'searchTerm' => $search]);
}


public function jobType(){
    $jobtype=DB::table('jobType')->get();
    dd($jobtype);
    return view('Edit',compact('jobtype'));

}

}

