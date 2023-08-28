<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table='enrollment';

    function student(){
        return $this->belongsTo(Student::class);
    }
    function course(){
        return $this->belongsTo(Course::class);
    }
}
