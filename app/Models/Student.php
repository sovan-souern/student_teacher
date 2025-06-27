<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

     protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'age',
    'province',
    'class', 
    'grade',
    'teacher_id',
];

}
