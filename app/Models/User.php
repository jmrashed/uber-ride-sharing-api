<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Ride;
use App\Models\Trip;
use App\Models\Booking;
use App\Models\Notification;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PasswordResetToken;
use App\Models\PersonalAccessToken;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function passwordResetToken()
    {
        return $this->hasOne(PasswordResetToken::class);
    }
    public function tokens()
    {
        return $this->hasMany(PersonalAccessToken::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function driverRide()
    {
        return $this->hasOneThrough(Ride::class, Booking::class, 'user_id', 'id', 'id', 'ride_id');
    }
    public function driverRides()
    {
        return $this->hasManyThrough(Ride::class, Booking::class, 'user_id', 'ride_id', 'id', 'id');
    }
}