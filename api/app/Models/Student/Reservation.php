<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'Item',
        'UpperSize',
        'LowerSize',
        'BookName',
        'SubjectCode',
        'SubjectDesc',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
