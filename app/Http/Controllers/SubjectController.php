<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create()
    {
        $years = Year::all()->where('person_id',3);
        $subject = Subject::all()->where('person_id',3);
        return view('subject',compact('years','subject'));
    }
    public function store(Request $request)
    {

        $request->validate(
            [
               'name' => 'required',
               'year_id'=> 'required|exists:years,year_id',
            ]
            );
       
        // $subject = new Subject;    
        // $subject->name = $request->name;
        // $subject->year_id = $request->year_id;
        // $subject->person_id = 3; 
        // $subject->save();
        // dd($request->all()); // Add this line before your Subject or Chapter code

        $subject = Subject::firstOrCreate(
            ['name'=> $request['name']],
            ['year_id'=> $request['year_id'],'person_id'=> 3]);
            // dd($request->all()); // Add this line before your Subject or Chapter code

        return redirect('chapter');
   
}    
}


