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
        $booking->status = 'unpaid';
        // Anda bisa menambahkan field lain sesuai kebutuhan

        // Simpan booking ke dalam database
        $booking->save();

        // Cari destinasi berdasarkan ID yang disimpan
        $destination = Destination::where('id_destination', $booking->id_destination)->firstOrFail();

        // Redirect ke halaman booking dengan pesan sukses
        return redirect()->route('booking', ['destination' => $destination->name])->with('success', 'Booking tiket berhasil!');
    }

    public function payment()
    {
        $booking = Booking::with('destination')
                    ->where('id_user', auth()->user()->id_user)
                    ->where('status', 'unpaid')
                    ->latest()
                    ->first();

        if (!$booking) {
            return redirect()->route('home')->with('success', 'Tidak ada tiket yang perlu dibayar.');
        }

        return view('payment.payment', compact('booking'));
    }

    public function actionPayment(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        // Cari booking yang unpaid untuk user yang sedang login
        $booking = Booking::where('id_user', auth()->user()->id_user)
                          ->where('status', 'unpaid')
                          ->latest()
                          ->firstOrFail();

        // Update booking status menjadi paid dan simpan metode pembayaran
        $booking->status = 'paid';
        $booking->payment_method = $request->input('payment_method');
        $booking->save();

        // Redirect ke halaman konfirmasi dengan pesan sukses
        return redirect()->route('payment')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}
