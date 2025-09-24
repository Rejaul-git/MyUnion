<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
        'date_of_birth',
        'birth_num',
        'nid',
        'general',
        'password',
        'otp',
        'otp_expires_at',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'date_of_birth' => 'date',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    
    public function taxes()
    {
        return $this->hasMany(Tax::class);
    }
}
