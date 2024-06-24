<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking: Melali</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 max-w-lg rounded-lg bg-white p-6 shadow-lg">
        <h1 class="mb-4 text-3xl font-bold text-center text-gray-800">Form Pemesanan Tiket</h1>
        <h2 class="mb-6 text-2xl text-center text-gray-600">{{ $judulForm }}</h2>
        <form action="/submit_booking" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>
            <div class="mt-6 text-center">
                <button type="submit" class="w-full rounded-lg bg-indigo-500 px-4 py-2 text-white transition duration-300 hover:bg-indigo-600">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
