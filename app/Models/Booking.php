<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    
    protected $table = 'bookings';
    protected $primaryKey = 'id_booking';

    protected $fillable = ['id_user','full_name','email','no_hp','id_destination','quantity','total_price','payment_method','booking_date'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination');
    }

}
