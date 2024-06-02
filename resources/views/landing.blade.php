<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RW Landing Page</title>
    @vite('resources/css/app.css')
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
            background: linear-gradient(to right, #FF7D29, #FFBF78);
            color: white;
            padding: 4rem 0;
            text-align: center;
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
                <button onclick="toggleDarkMode()" class="btn-login">Toggle Dark Mode</button>

                <a href="{{ route('filament.auth.login') }}" class="btn-login">Login</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="hero">
    <div class="container mx-auto px-6">
        <h1 class="font-bold">Selamat datang di SIMRW!<br>Welcome to SIMRW!</h1>
        <p>Menghubungkan warga berkembang bersama</p>
        <p>Connecting citizen growing together </p>
    </div>
</header>

<!-- Profil RW Section -->
<section class="container mx-auto px-6 py-16">
    <h2 class="section-title">Profil RW</h2>
    <div class="text-center">
        <p class="text-lg text-neutral">
            RW 09 is dedicated to fostering a strong community spirit through various activities and initiatives that
            benefit all residents. Our mission is to create a safe, inclusive, and vibrant neighborhood where everyone
            feels welcome and valued.
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
<section class="container mx-auto px-6 py-16">
    <h2 class="section-title">Struktur Organisasi</h2>
    <div class="mt-8 flex flex-wrap justify-center">
        <div class="w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <h3>Chairperson</h3>
                <p>John Doe</p>
            </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <h3>Secretary</h3>
                <p>Jane Smith</p>
            </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <h3>Treasurer</h3>
                <p>Mike Johnson</p>
            </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/4 p-6">
            <div class="card">
                <h3>Community Liaison</h3>
                <p>Emily Davis</p>
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
</script>

</body>
</html>
