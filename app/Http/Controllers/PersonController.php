<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function create()
    {
        
         $url = url('/person');
         $title = "Register Person";
        //  $person = null;
         $data = compact('url','title');
        return view('welcome')->with($data);
    } 
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confir' => 'required|same:password'
            ]);
        // echo "<pre>";
        // print_r($request->all());

         ///Insert Query///

        $person = new Person;     //create the new person 
        $person->name = $request['name'];
        $person->email = $request['email'];
        $person->password = md5($request['password']);
        $person->password_confir = $request['password_confir'];
        $person->save();   //save the person

        return redirect('person/view'); 
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $persons = Person::where('name', 'LIKE' , "%$search%")->orWhere('email', 'LIKE' , "%$search%")->get();
        }
        else
        {
            $persons = Person::paginate(15);
        }
         $data = compact('persons','search');
        return view('person-view')->with($data);
    }
    public function trash()
    {
        $persons = Person::onlyTrashed()->get();
         $data = compact('persons');
        return view('person-trash')->with($data);
    }
    public function delete($id)
    {
        // if(!is_null($person)){
        // $person->delete();
        // }
        $person = Person::find($id)->delete();
        return redirect()->back();
    }
    public function forceDelete($id)
    {
        // if(!is_null($person)){
        // $person->delete();
        // }
        $person = Person::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $person = Person::withTrashed()->find($id);
        if(!is_null($person))
        {
            $person->restore();
        }
        return redirect('person/view');
    }
    public function edit($id)
    {
         $person = Person::find($id);

        if(is_null($person))
        {
            return redirect()->back();
        }
        else
        {
              $title = "Update Person";
             $url = url('/person/update'). "/". $id;
             $data = compact('person','url','title');
             return view('welcome')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $person = Person::find($id);
        $person->name = $request['name'];
        $person->email = $request['email'];
        $person->password = $request['password'];
        $person->password_confir = $request['password_confir'];
        $person->save();

        return redirect('person/view'); 
    }
}
