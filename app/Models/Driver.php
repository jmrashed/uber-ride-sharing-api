<?php

namespace App\Models;

use App\Models\Ride;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'car_make', 'car_model', 'car_year', 'license_plate',
        'driver_status', 'current_latitude', 'current_longitude',
    ];

    // Driver Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rides()
    {
        return $this->hasMany(Ride::class);
    }
}
