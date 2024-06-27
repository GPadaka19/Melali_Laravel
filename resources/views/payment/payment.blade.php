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
    @endif

    @if(session('success'))
        <div class="alert alert-success fixed top-0 right-0 m-4 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success alert!</span> Your payment has been confirmed.
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fade out alert after 3 detik
            var alert = document.querySelector(".alert-success");
            if (alert) {
                setTimeout(function() {
                    alert.style.transition = "opacity 1s";
                    alert.style.opacity = "0";
                    setTimeout(function() {
                        alert.remove();
                    }, 1000);
                }, 3000);
            }

            setTimeout(function() {
                window.location.href = "{{ url('home') }}";
            }, 5000);
        });
        </script>
    @endif
</body>
</html>