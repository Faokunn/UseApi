<?php

namespace App\Models\Student;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use app\Models\Student\Books;
use app\Models\Student\lowerUniform;
use app\Models\Student\upperUniform;
use app\Models\Student\Notification;
use app\Models\Student\PickUp;
use app\Models\Student\rso;
use app\Models\Student\Reservation;
use app\Models\Student\Profile;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

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
        return $this->hasOne(Profile::class);
    }
    public function upperUniform(){
        return $this->hasOne(upperUniform::class);
    }
    public function lowerUnifrom(){
        return $this->hasOne(lowerUniform::class);
    }
    public function rso(){
        return $this->hasOne(rso::class);
    }
    public function book(){
        return $this->hasMany(Books::class);
    }
    public function notiication(){
        return $this->hasMany(Notification::class);
    }
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
    public function pickup(){
        return $this->hasMany(pickup::class);
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
