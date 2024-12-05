<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function create()
    {
        $subject = Subject::all()->where('person_id',3);
        return view('chapter',compact('subject'));
    }
    public function store(Request $request)
    {
        
             $request->validate(
            [
               'chapter_name' => 'required',
               'chapter_no'=> 'required',
               'subject_id'=> 'required|exists:subjects,subject_id',
            ]
            );
       
        // $chapter = new Chapter;    
        // $chapter->chapter_name = $request->chapter_name;
        // $chapter->chapter_no = $request->chapter_no;
        // $chapter->subject_id = $request->subject_id;
        // $chapter->person_id = 3; 
        // $chapter->save();   

        // $chapter = Chapter::firstOrCreate(
        //     ['chapter_name'=> $request['chapter_name']],
        //     ['chapter_no'=> $request['chapter_no']],
        //     ['subject_id' => $request['subject_id'],'person_id'=> 3]);

        $chapter = Chapter::firstOrCreate(
            [
                'chapter_name' => $request['chapter_name'], 
                'chapter_no' => $request['chapter_no'],
                'subject_id' => $request['subject_id'] // Ensure this is being passed
            ],
            ['person_id' => 3]
        );
                
         return redirect('question'); 
    }
}
