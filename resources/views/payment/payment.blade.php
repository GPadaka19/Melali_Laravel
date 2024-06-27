<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 max-w-lg rounded-lg bg-white p-6 shadow-lg">
        <h1 class="mb-4 text-3xl font-bold text-center text-gray-800">Konfirmasi Pembayaran</h1>
        @if(isset($booking))
        <form id="paymentForm" class="items-center justify-center space-y-15 md:space-y-6 ">
            <div class="p-4 mb-4 text-sm text-gray-700  rounded-lg" role="alert">
                <h3 class="text-lg font-semibold">Detail Pemesanan:</h3>
                <div class="mb-4">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap:</label>
                    <input type="text" id="full_name" name="full_name" value="{{ $booking->full_name }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 cursor-default">
                </div>
                <div class="mb-4">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
                    <input type="text" id="full_name" name="full_name" value="{{ $booking->email }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 cursor-default" >
                </div>
                <div class="mb-4">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Nomor HP:</label>
                    <input type="text" id="full_name" name="full_name" value="{{ $booking->no_hp }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 cursor-default">
                </div>
                <div class="mb-4">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Nomor HP:</label>
                    <input type="text" id="full_name" name="full_name" value="{{ $booking->booking_date }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 cursor-default">
                </div>
                <div class="mb-4">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Jumlah Tiket:</label>
                    <input type="text" id="full_name" name="full_name" value=" {{ $booking->quantity }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 cursor-default">
                </div>
                <div class="mb-4">
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Total Harga:</label>
                    <input type="text" id="full_name" name="full_name" value="Rp {{ number_format($booking->total_price, 0, ',', '.') }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 cursor-default">
                </div>
            </div>
        </form>
            
            <h3 class="text-lg font-semibold text-gray-700">Pilih Metode Pembayaran:</h3>
            <form action="{{ route('payment.action') }}" method="POST" class="space-y-4">
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
                <div class="mt-6 text-center">
                    <button type="submit" class="w-full rounded-lg bg-indigo-500 px-4 py-2 text-white transition duration-300 hover:bg-indigo-600 mt-4">Pay Now</button>
                </div>
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
    </div>
</body>
</html>