<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Paper;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionPaper;
use Barryvdh\DomPDF\Facade\Pdf;

class CreatePaperController extends Controller
{
    public function selectform()
    {
        $years = Year::all()->where('person_id',3);
        $subject = Subject::all()->where('person_id',3);
        $chapter = Chapter::all()->where('person_id',3);
        $question = Question::all()->where('person_id',3);
        return view('select',compact('years','subject','chapter','question'));
    }

    public function fetch(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'year_id' => 'required|exists:years,year_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'chapter_id' => 'required|exists:chapters,chapter_id',
            'question_type' => 'required|exists:questions,question_type',
            'rating' => 'required|exists:questions,rating',
            // 'short_question' => 'required|integer',
            // 'name_of_institute' => 'required|string|min:3',
        ]);
        // $name_of_institute  = $request->input('name_of_institute');
        $questions = Question::where('chapter_id', $request->chapter_id)
        ->where('question_type', $request->question_type)->where('rating',$request->rating)->where('person_id',3)->get();
        // dd($questions);
        $paper = new Paper();
        $paper->questions = $questions;
        $paper->person_id = 3;
        $paper->save();
        // dd($paper); //
            return view('show',compact('questions'));
            // $pdf = PDF::loadView('show',compact('question'));
            // return $pdf->download('QuestionPaper.pdf');
           

    }
       public function generatepdf(Request $request)
       {
        $data= $request->all();
        //    dd($data);
       
         $questions = $request->input('questions', []);
        
         // Default to empty array if not found

         $validated = $request->validate([
            'questions' => 'nullable|array',
            'questions.*' => 'string',
        ]);
        $data =[
            'question' => $questions    
        ];
      
        $pdf = PDF::loadView('pdf',compact('questions'));
        return $pdf->download('question-paper.pdf');

       }
       public function savepaper()
       {
        $papers = Paper::all();
        return view('paperslist',compact('papers'));
       }

         public function viewp($paper_id)
        {
            $paper = Paper::findOrFail($paper_id);
            // dd($paper);
            // No need to split, JSON fields are automatically cast to arrays
            $questions = $paper->questions ;                        
            // ? json_decode($paper->short_questions, true) : [];
            // dd($questions);


            return view('viewpaper', compact('questions'));

        }
        public function destroy($paper_id)
        {
            $paper = Paper::findOrFail($paper_id);
            $paper->delete();

            return redirect()->back();
        }

}
