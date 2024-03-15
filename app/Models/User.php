<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;



class User extends AuthenticatableUser implements Authenticatable,MustVerifyEmail
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'is_employer','is_admin', 'email_verified_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isEmployer()
    {
        return $this->is_employer;
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function employer()
    {
        return $this->hasOne(Employer::class);
    }
}
