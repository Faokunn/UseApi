<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirstName',
        'LastName',
        'Course',
        'Department',
        'hasUUniform',
        'hasLUniform',
        'hasRSO',
        'hasBooks',
        'Year',
        'Status',
        'stu_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'stu_id', 'studentId');
    }
}