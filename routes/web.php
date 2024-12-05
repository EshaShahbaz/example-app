<?php

use App\Models\Year;
use App\Models\Person; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CreatePaperController;

Route::get('/member',[IndexController::class,'index']);
Route::get('/group',[IndexController::class,'group']);

Route::get('/', function () {
    return view('index');
});

// route::get('/form',function(){
//     $forms = Form::all();
//     echo "<pre>";
//     print_r($forms->toArray());
// });

Route::get('/form',[FormController::class, 'index']);
Route::post('/form',[FormController::class, 'register']);

Route::group(['prefix' => '/person'], function() {
Route::get('/create',[PersonController::class, 'create']);
Route::get('/view',[PersonController::class, 'view']);
Route::post('/',[PersonController::class, 'store']);
Route::get('/delete/{id}',[PersonController::class,'delete']);
Route::get('/force-delete/{id}',[PersonController::class,'forceDelete']);
Route::get('/trash',[PersonController::class, 'trash']);
Route::get('/restore/{id}',[PersonController::class,'restore']);
Route::get('/edit/{id}',[PersonController::class,'edit']);
Route::post('/update/{id}',[PersonController::class,'update']);
});

Route::get('/upload',function()
{
    return view('upload');
});
Route::post('/upload',[UploadController::class,'upload']);






Route::get('/no-access',function(){
    echo "you are not allowed to access these pages";
});



Route::get('/year',[YearController::class,'index']);
Route::post('/year',[YearController::class,'store']);


Route::get('/subject',[SubjectController::class,'create']);
Route::post('/subject',[SubjectController::class,'store']);

Route::get('/chapter',[ChapterController::class,'create']);
Route::post('/chapter',[ChapterController::class,'store']);

Route::get('/question',[QuestionController::class,'create']);
Route::post('/question',[QuestionController::class,'store']);

Route::get('createpaper',[CreatePaperController::class,'selectform']);
Route::post('show',[CreatePaperController::class,'fetch']);

// Route::get('paper-view',[QuestionController::class,'paperview']);
Route::get('/paperview',[QuestionController::class,'paperview']);
Route::post('/pdf',[CreatePaperController::class,'generatepdf']);
Route::get('/paperslist',[CreatePaperController::class,'savepaper']);
Route::get('/viewpaper/{paper_id}',[CreatePaperController::class,'viewp']);

Route::get('/delete/{paper_id}',[CreatePaperController::class,'destroy']);







