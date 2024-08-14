<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'Course',
        'Department',
        'Year',
        'Status',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
