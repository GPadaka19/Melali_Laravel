<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking: Melali</title>
    @vite('resources/css/app.css')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("booking_date").setAttribute('min', today);
    
    phoneNumberInput.addEventListener("input", function() {
            const phoneNumber = phoneNumberInput.value.trim();
            
            // Check if the phone number starts with "08"
            if (!phoneNumber.startsWith("08")) {
                phoneNumberInput.setCustomValidity("Nomor HP harus dimulai dengan '08'");
            } else {
                phoneNumberInput.setCustomValidity("");
            }
        });
    });
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 max-w-lg rounded-lg bg-white p-6 shadow-lg">
        <h1 class="mb-4 text-3xl font-bold text-center text-gray-800">Form Pemesanan Tiket</h1>
        <h2 class="mb-6 text-2xl text-center text-gray-600">{{ $judulForm }}</h2>
        <form id="submitForm" class="items-center justify-center space-y-15 md:space-y-6 " action="{{route('actionbooking')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="destinasi" class="block mb-2 text-sm font-medium text-gray-700">Destinasi:</label>
                <input type="text" id="destinasi" name="destinasi" value="{{ $judulForm }}" readonly class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200">
                <input type="hidden" name="id_destination" value="{{ $destination->id_destination }}">
            </div>
            <div class="mb-4">
                <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap:</label>
                <input type="text" id="full_name" name="full_name" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="text-gray-400 w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-700">Nomor HP:</label>
                <input type="tel" placeholder="08123456789101" id="no_hp" name="no_hp" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" pattern="[0-9]*" maxlength="13" minlength="10"  required>
            </div>
            <div class="mb-4">
                <label for="booking_date" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Booking:</label>
                <input type="date" id="booking_date" name="booking_date" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_tiket" class="block mb-2 text-sm font-medium text-gray-700">Jumlah Tiket:</label>
                <input type="number" id="jumlah_tiket" name="quantity" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" value="1" required>
            </div>
            <div class="mt-6 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Pilih Metode Pembayaran:</h3>
                <div class="flex justify-center mt-4">
                    <label for="metode_pembayaran_transfer" class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" id="metode_pembayaran_transfer" name="payment_method" value="transfer" class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
                        <span>Transfer Bank</span>
                    </label>
                    <label for="metode_pembayaran_cod" class="flex items-center space-x-2 cursor-pointer ml-4">
                        <input type="radio" id="metode_pembayaran_cod" name="payment_method" value="qris" class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
                        <span>QRIS</span>
                    </label>
                </div>
                <button type="submit" class="w-full rounded-lg bg-indigo-500 px-4 py-2 text-white transition duration-300 hover:bg-indigo-600 mt-4">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
