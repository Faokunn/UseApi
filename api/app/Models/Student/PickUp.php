<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class PickUp extends Model
{
    use HasFactory;
    protected $fillable = [
        'PickUpCode',
        'Duration',
        'Item',
        'Status',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
