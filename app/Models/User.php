<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'full_name',
        'email',
        'password',
        'role',
        'profile_image',
        'age',
        'sex',
        'contact_number',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'string',
        'age' => 'integer',
    ];

    protected $appends = ['profile_image_url'];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function getProfileImageUrlAttribute()
    {
        return $this->profile_image 
            ? asset('storage/'.$this->profile_image)
            : asset('images/default-profile.png');
    }
}