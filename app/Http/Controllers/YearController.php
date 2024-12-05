<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;

class YearController extends Controller
{
    public function index()
    {
        // $year = Year::all();
        // return view('year',compact('year'));
        return view('year');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required',
            ]);
        // echo "<pre>";
        // print_r($request->all());

         ///Insert Query///

        // $year = new Year;   
        // $year->name = $request['name'];
        // $year->person_id = 3;
        // $year->save(); 
        //The firstOrCreate method is a built in method or convenient way to retrieve a model instance based on a set of attributes, and if no matching instance is found, create a new one with the specified attributes. It's a shorthand for the common pattern of checking if a record exists, and if not, creating a new one.
        $year = Year::firstOrCreate(['name' => $request['name']], ['person_id' => 3]);  

        return redirect('subject'); 
    }
}
