<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $primaryKey = 'id_destination';

    protected $fillable = [
        'id_user',
        'full_name',
        'email',
        'no_hp',
        'id_destination',
        'booking_date',
        'quantity',
        'payment_method',
        'total_price',
    ];

    // Relasi dengan tabel Destinations
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_destination', 'id_destination');
    }
}