<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat datang di RW 5</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Additional custom styles can go here */
        .sticky {
            position: sticky;
            top: 0;
            z-index: 50;
        }

        :root {
            --bg-primary: #FFFFFF; /* White */
            --text-primary: #FF7D29; /* Orange */
            --bg-secondary: #F3F4F6; /* Light Gray */
            --text-secondary: #F3F4F6; /* Light Gray */
            --bg-accent: #FF7D29; /* Orange */
            --text-accent: #FF7D29; /* Orange */
            --bg-neutral: #F9FAFB; /* Almost White */
            --text-neutral: #4B5563; /* Dark Gray */
        }

        body.dark-mode {
            --bg-primary: #1a202c; /* Dark Blue */
            --text-primary: #cbd5e0; /* Light Gray */
            --bg-secondary: #2d3748; /* Dark Gray */
            --text-secondary: #e2e8f0; /* Gray */
            --bg-accent: #f56565; /* Red */
            --text-accent: #2d3748; /* Dark Gray */
            --bg-neutral: #2d3748; /* Dark Gray */
            --text-neutral: #cbd5e0; /* Light Gray */
        }

        body {
            background-color: var(--bg-neutral);
            color: var(--text-neutral);
            transition: background-color 0.3s, color 0.3s;
        }

        .bg-primary {
            background-color: var(--bg-primary);

        }

        .text-primary {
            color: var(--text-primary);
        }

        .bg-secondary {
            background-color: var(--bg-secondary);
        }

        .text-secondary {
            color: var(--text-secondary);
        }

        .bg-accent {
            background-color: var(--bg-accent);
        }

        .text-accent {
            color: var(--text-accent);
        }

        .bg-neutral {
            background-color: var(--bg-neutral);
        }

        .text-neutral {
            color: var(--text-neutral);
        }

        .btn-login {
            background-color: var(--bg-accent);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.9rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #FFBF78; /* Light Orange */
            color: #4B5563; /* Dark Gray */
        }

        .container {
            max-width: 1200px;
        }

        .card {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
        }

        .hero {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    overflow: hidden;

}


        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0000002f; /* Fallback color */
        }

        .hero-container {
            background: rgba(0, 0, 0, 0.5); /* Memberikan efek transparan pada container */
            padding: 20px;
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #FF7D29;
        }

        .card h3 {
            font-size: 1.5rem;
            color: #FF7D29;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1rem;
            color: #4B5563;
        }

        /* Scrollable section styles */
        .scroll-container {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 1rem;
            padding: 1rem 0;
        }

        .scroll-container::-webkit-scrollbar {
            display: none;
        }

        .scroll-container > * {
            scroll-snap-align: center;
            flex: 0 0 auto;
        }

        .scroll-arrow {
            cursor: pointer;
            font-size: 2rem;
            color: #FF7D29;
            user-select: none;
        }

        .scroll-arrow.disabled {
            color: #F3F4F6;
            cursor: default;
        }
    </style>
</head>
<body class="bg-neutral">

<!-- Navbar -->
<nav class="bg-primary shadow sticky">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <div>
                <a href="#" class="text-primary text-xl font-bold">SIMRW</a>
            </div>
            <div>
                <button onclick="toggleDarkMode()" class="btn-login">Ganti Mode Warna</button>

                <a href="{{ route('filament.auth.login') }}" class="btn-login">Login</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="hero">
    <div class="swiper-container">
          <div class="swiper-wrapper">        
              <div class="swiper-slide" style="background-image: url({{ asset('/images/kegiatan1.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
                  <div class=" w-full text-center bg-black bg-opacity-75 text-white p-4">
                    <h1 class="font-bold text-white">Selamat datang di SIMRW!<br>Welcome to SIMRW!</h1>
                    <p class="text-white">Menghubungkan warga berkembang bersama</p>
                    <p class="text-white">Connecting citizen growing together </p>
               
                  </div>
              </div>
              <div class="swiper-slide" style="background-image: url({{ asset('/images/kegiatan2.jpeg') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
                  <div class="w-full text-center bg-black bg-opacity-75 text-white p-4">
                    <h1 class="font-bold text-white">Selamat datang di SIMRW!<br>Welcome to SIMRW!</h1>
                    <p class="text-white">Menghubungkan warga berkembang bersama</p>
                    <p class="text-white">Connecting citizen growing together </p>
               
                  </div>
              </div>
              <div class="swiper-slide" style="background-image: url({{ asset('/images/kegiatan3.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
                  <div class="w-full text-center bg-black bg-opacity-75 text-white p-4">
                    <h1 class="font-bold text-white">Selamat datang di SIMRW!<br>Welcome to SIMRW!</h1>
                    <p class="text-white">Menghubungkan warga berkembang bersama</p>
                    <p class="text-white">Connecting citizen growing together </p>
               
                  </div>
              </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Add Navigation -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
      </div>
  </header>

<!-- Profil RW Section -->
<section class="container mx-auto px-6 py-16">
    <h2 class="section-title">Profil RW</h2>
    <div class="text-center">
        <p class="text-lg text-neutral">
            SIMRW adalah aplikasi yang membantu warga RW 05 Kelurahan Jatimulyo, Kecamatan Lowokwaru, Kota Malang untuk
            terhubung dan berkembang bersama.
            Aplikasi ini memudahkan kita semua dalam melakukan administrasi yang biasanya lumayan merepotkan.
        </p>
    </div>
</section>

<!-- Kegiatan RW Section -->
{{-- pengkondisian jika tanggal kegiatan lebih besar dari waktu sekarang --}}
<section class="bg-secondary shadow py-16">
    <div class="container mx-auto px-6 relative">
        <h2 class="section-title">Kegiatan RW</h2>
        <div class="scroll-container">
            @foreach($kegiatan as $item)
                @if(strtotime($item->tanggal . ' ' . $item->pukul) > time())
                    <div class="card">
                        <h3>{{ $item->perihal }}</h3>
                        <p>Tempat : {{ $item->tempat }}</p>
                        <p>Acara : {{ $item->acara }}</p>
                        <p>Tanggal : {{ date('d-m-Y', strtotime($item->tanggal)) }}</p>
                        <p>Waktu : {{ $item->pukul }} WIB</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Struktur Organisasi Section -->
<section class="container mx-auto px-6 py-2">
    <h2 class="section-title">Struktur Organisasi</h2>
    <div class="mt-8 flex flex-wrap justify-center">
        <div class="w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/nopal.jpg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Ketua RW</h3>
                <p><strong>Mohammad Naufal</strong></p>
            </div>
        </div>
        
    </div>
</section>
<section class="container mx-auto px-6 py-2">
    <div class="mt-8 flex flex-nowrap overflow-x-auto justify-center">
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/Pejabat.jpg') }}" alt="Logo" class="h-80 w-full object-cover mx-auto">
                <h3>Wakil Ketua RW</h3>
                <p><strong>Joko Widodo</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat2.jpg') }}" alt="Logo" class="h-80 w-full object-cover mx-auto">
                <h3>Sekretaris RW</h3>
                <p><strong>Ahmad Fauzi</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat3.jpg') }}" alt="Logo" class="h-80 w-full object-cover mx-auto">
                <h3>Bendahara RW</h3>
                <p><strong>Eko Prasetyo</strong></p>
            </div>
        </div>
    </div>
</section>
<section class="container mx-auto px-6 py-2">
    <div class="mt-8 flex overflow-x-auto">
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat5.jpg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Ketua RT 1</h3>
                <p><strong>Budi Santoso</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat6.jpeg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Sekretaris RT 1</h3>
                <p><strong>Siti Aminah</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat7.jpeg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Bendahara RT 1</h3>
                <p><strong>Andi Susanto</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat8.jpeg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Ketua RT 2</h3>
                <p><strong>Rini Wulandari</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat9.jpg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Sekretaris RT 2</h3>
                <p><strong>Ahmad Bayu</strong></p>
            </div>
        </div>
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <img src="{{ asset('/images/pejabat10.jpg') }}" alt="Logo" class="h-80 mx-auto">
                <h3>Bendahara RT 2</h3>
                <p><strong>Siti Rahmawati</strong></p>
            </div>
        </div>
        
    </div>
</section>
<div class="bg-secondary">
    <section class=" shadow container mx-auto px-6 py-16">
        <div id="mapid" style="height: 400px;"></div>
    </section>

</div>

<!-- Footer -->
<footer class="bg-primary shadow mt-8">
    <div class="container mx-auto px-6 py-4 text-center">
        <p class="text-neutral">&copy; SIMRW RW 5. All rights reserved.</p>
    </div>
</footer>

<script>
    const scrollContainer = document.querySelector('.scroll-container');
    const leftArrow = document.querySelector('.left-arrow');
    const rightArrow = document.querySelector('.right-arrow');

    function updateArrows() {
        if (scrollContainer.scrollLeft === 0) {
            leftArrow.classList.add('disabled');
        } else {
            leftArrow.classList.remove('disabled');
        }

        if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth) {
            rightArrow.classList.add('disabled');
        } else {
            rightArrow.classList.remove('disabled');
        }
    }

    function scrollLeft() {
        scrollContainer.scrollBy({
            left: -scrollContainer.clientWidth,
            behavior: 'smooth'
        });
    }

    function scrollRight() {
        scrollContainer.scrollBy({
            left: scrollContainer.clientWidth,
            behavior: 'smooth'
        });
    }

    scrollContainer.addEventListener('scroll', updateArrows);
    document.addEventListener('DOMContentLoaded', updateArrows);

    var mymap = L.map('mapid').setView([-7.936885711016384, 112.61254034198969], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(mymap);

    L.marker([-7.936885711016384, 112.61254034198969]).addTo(mymap)
        .bindPopup("<b>RW 05 Kelurahan Jatimulyo</b>").openPopup();

    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
    }
    new Swiper('.swiper-container', {
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
   delay: 5000,
 },
});
</script>

</body>
</html>
