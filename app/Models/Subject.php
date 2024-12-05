<?php

namespace App\Models;

use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subjects";
    protected $primaryKey = "subject_id";
    protected $fillable = ['name','year_id', 'person_id'];

   
    // function year()
    // {
    //     return $this->hasMany('App\Models\year', 'year_id','year_id');
    // } 
    
    // public function years()
    // {
    //     return $this->belongsTo('App\Models\Year','year_id','year_id');
    // }



    public function years()
    {
        return $this->belongsTo(Year::year);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    public function person()
    {
        return $this->belongs(Person::class);
    }
}
