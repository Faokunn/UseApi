<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'Description',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
