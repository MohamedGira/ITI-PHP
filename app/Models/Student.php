<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='student';
    protected $guarded=['id'];

    public $timestamps=false;
    
    function enrollments(){
        return $this->hasMany(Enrollment::class);
    }
}
