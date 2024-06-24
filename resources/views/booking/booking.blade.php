<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking: Melali</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold">Form Pemesanan Tiket</h1>
        <h2 class="text-2xl">{{ $judulForm }}</h2>
    </div>
    <form action="/submit_booking" method="POST">
        @csrf
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>