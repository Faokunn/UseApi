<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class rso extends Model
{
    use HasFactory;
    protected $fillable = [
        'RsoSize',
        'HasRso',
        'Status',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
