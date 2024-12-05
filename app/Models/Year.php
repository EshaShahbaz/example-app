<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;
    protected $table = "years";
    protected $primaryKey = "year_id";

    //Mass assignment is the process of passing an array of key-value pairs (attributes and their values) to a model when creating or updating a record. Instead of manually setting each attribute one by one, you can set them all at once using methods like create() or update().
    protected $fillable = ['name', 'person_id'];
    // function subject()
    // {
    //     return $this->hasMany('App\Models\Subject', 'year_id','year_id');
    // } 
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function person()
    {
        return $this->belongs(Person::class);
    }

   
}
