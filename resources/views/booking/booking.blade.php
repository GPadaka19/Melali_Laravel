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

        var jumlahTiketInput = document.getElementById("jumlah_tiket");
        var totalHargaInput = document.getElementById("total_harga");

        // Function to update total price based on quantity
        function updateTotalPrice() {
            var hargaPerTiket = {{ $destination->price }};
            var jumlahTiket = jumlahTiketInput.value;

            var totalHarga = hargaPerTiket * jumlahTiket;
            totalHargaInput.value = "Rp " + totalHarga.toLocaleString('id-ID');
        }

        // Initial update when page loads
        updateTotalPrice();

        // Add event listener to jumlah_tiket input
        jumlahTiketInput.addEventListener("input", function() {
            updateTotalPrice();
        });

        // Validate phone number input
        var phoneNumberInput = document.getElementById("no_hp");
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
            <input type="text" id="destinasi" name="destinasi" value="{{ $judulForm }}" readonly
                class="text-neutral-500 w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
                style="cursor: default;">
            <input type="hidden" name="id_destination" value="{{ $destination->id_destination }}">
            </div>
            <div class="mb-4">
                <label for="full_name" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap:</label>
                <input type="text" id="full_name" name="full_name" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="text-gray-700 w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" requiredv>
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-700">Nomor HP:</label>
                <input type="tel" placeholder="08123456789" id="no_hp" name="no_hp" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" pattern="[0-9]*" maxlength="13" minlength="10" required>
            </div>
            <div class="mb-4">
                <label for="booking_date" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Booking:</label>
                <input type="date" id="booking_date" name="booking_date" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_tiket" class="block mb-2 text-sm font-medium text-gray-700">Jumlah Tiket:</label>
                <input type="number" id="jumlah_tiket" name="quantity" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" value="1" min='1' required>
            </div>
            <div class="mb-4">
                <label for="total_harga" class="block mb-2 text-sm font-medium text-gray-700">Total Harga:</label>
                <input type="text" id="total_harga" name="total_price" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" value="Rp {{ number_format($destination->price, 0, ',', '.') }}" readonly required>
            </div>
            <div class="mt-6 text-center">
                <button type="submit" class="w-full rounded-lg bg-indigo-500 px-4 py-2 text-white transition duration-300 hover:bg-indigo-600 mt-4">Submit</button>
            </div>
        </form>
    </div>
    @if(session('success'))
        <div class="alert alert-success fixed top-0 right-0 m-4 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success alert!</span> Your order has been saved, redirecting to payment process, In
                <span id="countdown-text"></span>
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
                }, 5500);
            }

            var countdown = 5;

            function updateCountdown() {
                document.getElementById("countdown-text").textContent = " (" + countdown + " Second)";
                if (countdown > 0) {
                    countdown--;
                    setTimeout(updateCountdown, 1000);
                }
            }
            updateCountdown();

            setTimeout(function() {
                window.location.href = "{{ url('payment') }}";
            }, 5900);
        });
        </script>
    @endif
</body>
</html>