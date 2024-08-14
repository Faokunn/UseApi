<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'BookName',
        'hasBook',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
