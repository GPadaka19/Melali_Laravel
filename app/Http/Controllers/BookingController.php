<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Destination;

class BookingController extends Controller
{
    // Menampilkan form booking
    public function booking($destination)
    {
        // Cari destinasi berdasarkan nama
        $destination = Destination::where('name', $destination)->firstOrFail();

        return view('booking.booking', [
            'judulForm' => $destination->name,
            'destination' => $destination,
        ]);
    }

    public function actionbooking(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'id_destination' => 'required|exists:destinations,id_destination',
            'booking_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:transfer,qris',
        ]);

        // Proses penyimpanan data booking ke dalam database
        $booking = new Booking();
        $booking->id_user = auth()->user()->id_user; // Mengambil ID user dari auth
        $booking->full_name = $request->input('full_name');
        $booking->email = $request->input('email');
        $booking->no_hp = $request->input('no_hp');
        $booking->id_destination = $request->input('id_destination'); // Mengambil ID destinasi dari form
        $booking->booking_date = $request->input('booking_date');
        $booking->quantity = $request->input('quantity');
        $booking->payment_method = $request->input('payment_method');
        // Anda bisa menambahkan field lain sesuai kebutuhan

        // Simpan booking ke dalam database
        $booking->save();

        // Cari destinasi berdasarkan ID yang disimpan
        $destination = Destination::where('id_destination', $booking->id_destination)->firstOrFail();

        // Redirect ke halaman booking dengan pesan sukses
        return redirect()->route('booking', ['destination' => $destination->name])->with('success', 'Booking tiket berhasil!');
    }
}