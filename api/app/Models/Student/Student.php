<?php

namespace App\Models\Student;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Student\Profile;
use App\Models\Student\Notification;
use App\Models\Student\StudentBag;
use Laravel\Sanctum\HasApiTokens;


class Student extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'studentId',
        'password',
    ];
    public function profile(){
        return $this->hasOne(Profile::class, 'stu_id', 'studentId');
    }
    public function studentBag(){
        return $this->hasOne(StudentBag::class, 'stu_id', 'studentId');
    }

    public function notification(){
        return $this->hasOne(Notification::class, 'stu_id', 'studentId');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
