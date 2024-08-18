<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\BookCollection;
use App\Models\Student\LowerUniform;
use App\Models\Student\UpperUniform;
use App\Models\Student\Rso;

class StudentBag extends Model
{   
    use HasFactory;
    protected $fillable = [
        'stu_id'
    ];
    public function upperUniform(){
        return $this->hasOne(upperUniform::class, 'stu_id', 'studentId');
    }
    public function lowerUniform(){
        return $this->hasOne(lowerUniform::class, 'stu_id', 'studentId');
    }
    public function rso(){
        return $this->hasOne(rso::class, 'stu_id', 'studentId');
    }
    public function bookCollection(){
        return $this->hasOne(BookCollection::class, 'stu_id', 'studentId');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'stu_id', 'studentId');
    }
}
