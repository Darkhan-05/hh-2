<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeFormRequest;
use App\Models\City;
use App\Models\Gender;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $genders = Gender::all();
        $user = Auth::user();
        $user_id = $user->id;

        $resumes = Resume::where('user_id',$user_id)->get();
        if($resumes->isEmpty()){
            return view('resume.index');
        }else{
            return view('resume.index',compact('resumes','cities','genders'));
        }
    }

    public function create()
    {
        $cities = City::all();
        $genders = Gender::all();
        return view('resume.create',compact('cities','genders'));
    }



    public function store(Request $request)
    {


        $resume = Resume::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name ? $request->last_name : null,
            'age' => $request->age,
            'gender_id' => $request->gender_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'skills' => $request->skills,
        ]);
        return redirect()->route('resume.index')->with('message','Resume successfully saved');
    }
}
