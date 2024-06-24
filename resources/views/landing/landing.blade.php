<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melali</title>
    <link rel="stylesheet" href="css/style.css">
    <style>/* Fade-in Animation */
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Apply Animation to Header */
.text-4xl, .text-lg, .logo {
    animation: fade-in 1s ease-out; /* Terapkan animasi fade-in */
}

</style>
</head>
<body>

<nav class="bg-bgCustom fixed w-full h-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="index.html" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="img/logo.png" class="h-auto w-48 logo" alt="Melali logo">
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <a href="{{ route('login') }}"><button type="button"  class="border-2 text-white bg-orgCustom hover:bg-transparent hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-8 py-3 ml-4 text-center">
            Sign In
        </button>
        
    </div>    
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    </div>
</div>
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">Mau Wisata Kemana Hari ini?</h1>
    <p class="mb-8 text-lg font-normal text-black lg:text-xl sm:px-16 lg:px-48">Di Melali kami menyediakan berbagai informasi dan juga layanan pembelian tiket tempat wisata di Yogyakarta! </p>
    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 mx-auto">                    
                <a href="{{ route('login') }}" id="openhome" class="text-lg border-2 inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-orgCustom hover:bg-transparent hover:text-black focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
              Pesan Sekarang!
            </a>
        </div>
    </div>
</section>
</nav>

<!-- Script -->
<!-- <script src="js/script-home.js"></script> -->
<!-- Script -->

</body>
</html>