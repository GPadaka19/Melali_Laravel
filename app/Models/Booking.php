<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'id_booking';

    // Jika tabel memiliki kolom created_at dan updated_at, aktifkan timestamps
    public $timestamps = true; // Ubah ini jika tidak ada kolom timestamps

    protected $fillable = [
        'id_user', 'full_name', 'email', 'no_hp', 'id_destination', 
        'quantity', 'total_price', 'payment_method', 'booking_date'
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan model Destination
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination', 'id_destination');
    }

    // Jika Anda ingin mengatur format tanggal
    protected $dates = ['booking_date'];
}