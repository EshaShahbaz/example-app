<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Form;


class FormController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function register( Request  $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confir' => 'required|same:password'
            ]);
        echo "<pre>";
        print_r($request->all());

        // $form = new Form;
        // $form->name = $request['name'];
        // $form->email = $request['email'];
        // $form->password = md5($request['password']);
        // $form->Repeatyourpassword = $request['repeat your password'];
        // $form->save();
    }
}
