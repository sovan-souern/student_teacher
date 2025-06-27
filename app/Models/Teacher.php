<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    function students(){

        return $this->belongsTo(Student::class);

    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'province'
    ];
}
