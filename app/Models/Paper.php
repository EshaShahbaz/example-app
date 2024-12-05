<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table = "papers";
    protected $primaryKey = "paper_id";
    protected $fillable = ['questions','person_id'];

    // Casting JSON columns
    protected $casts = [
        'questions' => 'array', // Automatically cast to array
    ];

    // protected function questions(): Attribute {
    //     return Attribute::make(
    //         get: fn($value) => json_decode($value,true),
    //         set: fn($value) => json_encode($value),

    //     );
    // }
}
