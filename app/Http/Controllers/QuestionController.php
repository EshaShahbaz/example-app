<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Question;
use App\Models\Person;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        $chapter = Chapter::all()->where('person_id',3);
        return view('question',compact('chapter'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'add_question_text' => 'required',
            'question_type' => 'required|in:short,long',
            'rating' => 'required|in:normal,medium,hard',
            'chapter_id'=> 'required|exists:chapters,chapter_id',
        ]);

        $question = new Question;
        $question->add_question_text = $request->add_question_text;
        $question->question_type = $request->question_type;
        $question->rating = $request->rating;
        $question->chapter_id = $request->chapter_id;
        $question->person_id = 3;
        $question->save();

        // $chapter = Chapter::firstOrCreate(
        //     ['chapter_name'=> $request['chapter_name']],
        //     ['chapter_no'=> $request['chapter_no']],
        //     ['subject_id' => $request['subject_id']],
        //     ['person_id'=> 3]);

        $questions = Question::where('chapter_id',$request->chapter_id)->where('person_id',3)->get();
         return view('paper-view', compact('questions'));
        // return redirect()->back()->with('success','question is created successffully');
    }


    public function paperview(Request $request)
    {
        
             $questions = Question::where('chapter_id',$request->chapter_id)->get();
             return view('paper-view', compact('questions'));
    }
}
