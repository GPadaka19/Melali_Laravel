<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Konfirmasi Pembayaran</h1>
    @if(isset($booking))
        <div class="p-4 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg" role="alert">
            <h3 class="text-lg font-semibold">Detail Pemesanan:</h3>
            <p><strong>Nama Destinasi Wisata:</strong> {{ $booking->destination->name }}</p>
            <p><strong>Nama Lengkap:</strong> {{ $booking->full_name }}</p>
            <p><strong>Email:</strong> {{ $booking->email }}</p>
            <p><strong>Nomor HP:</strong> {{ $booking->no_hp }}</p>
            <p><strong>Tanggal Booking:</strong> {{ $booking->booking_date }}</p>
            <p><strong>Jumlah Tiket:</strong> {{ $booking->quantity }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
        </div>
        
        <h3 class="text-lg font-semibold text-gray-700">Pilih Metode Pembayaran:</h3>
        <form action="{{ route('payment.action') }}" method="POST">
            @csrf
            <div class="flex justify-center mt-4">
                <label for="metode_pembayaran_transfer" class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" id="metode_pembayaran_transfer" name="payment_method" value="transfer" class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
                    <span>Transfer Bank</span>
                </label>
                <label for="metode_pembayaran_qris" class="flex items-center space-x-2 cursor-pointer ml-4">
                    <input type="radio" id="metode_pembayaran_qris" name="payment_method" value="qris" class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
                    <span>QRIS</span>
                </label>
            </div>
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Pay Now</button>
        </form>
            
    @else
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            <h3 class="text-lg font-semibold">Tidak ada detail pemesanan yang ditemukan.</h3>
        </div>
    @endif
</body>
</html>