<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\StudentBag;
use App\Models\Student\Books;

class BookCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'stubag_id'
    ];
    public function studentBag(){
        return $this->belongsTo(StudentBag::class);
    }
    public function books(){
        return $this->hasMany(Books::class);
    }
}
