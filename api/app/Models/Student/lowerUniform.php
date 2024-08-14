<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class lowerUniform extends Model
{
    use HasFactory;
    protected $fillable = [
        'LowerSize',
        'HasUniform',
        'Status',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
