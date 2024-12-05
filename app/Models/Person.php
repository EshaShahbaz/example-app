<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "person";
    protected $primaryKey = "person_id";
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
