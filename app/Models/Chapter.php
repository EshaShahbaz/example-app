<?php

namespace App\Models;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = "chapters";
    protected $primaryKey = "chapter_id";

    protected $fillable = ['chapter_name','chapter_no','subject_id', 'person_id'];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function person()
    {
        return $this->belongs(Person::class);
    }
}
