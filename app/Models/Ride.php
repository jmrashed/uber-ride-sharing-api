<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ride extends Model
{
    use HasFactory;
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}