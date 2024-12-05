<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Member;
use App\Models\Group;


class IndexController extends Controller
{
    public function index()
    {
        return Member::with('getGroup')->get();
    }
    public function group()
    {
        return Group::with('member')->get();       
    }
}
