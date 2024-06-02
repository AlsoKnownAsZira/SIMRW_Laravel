<!DOCTYPE html>
<html lang="en">
<head>
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

        .bg-primary {
            background-color: #FFFFFF; /* White */
        }

        .text-primary {
            color: #FF7D29; /* Orange */
        }

        .bg-secondary {
            background-color: #F3F4F6; /* Light Gray */
        }

        .text-secondary {
            color: #F3F4F6; /* Light Gray */
        }

        .bg-accent {
            background-color: #FF7D29; /* Orange */
        }

        .text-accent {
            color: #FF7D29; /* Orange */
        }

        .bg-neutral {
            background-color: #F9FAFB; /* Almost White */
        }

        .text-neutral {
            color: #4B5563; /* Dark Gray */
        }

        .btn-login {
            background-color: #FF7D29; /* Orange */
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
                <a href="#" class="text-primary text-xl font-bold">RW Community</a>
            </div>
            <div>
                <a href="{{ route('filament.auth.login') }}" class="btn-login">Login</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="hero">
    <div class="container mx-auto px-6">
        <h1 class="font-bold">Welcome to RW Community</h1>
        <p>Connecting and empowering our neighborhood</p>
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
<section class="bg-secondary shadow py-16">
    <div class="container mx-auto px-6 relative">
        <h2 class="section-title">Kegiatan RW</h2>
        <div class="scroll-container">
            @foreach($kegiatan as $item)
                <div class="card">
                    <h3>{{ $item->perihal }}</h3>
                    <p>Tempat : {{ $item->tempat }}</p>
                    <p>Acara : {{ $item->acara }}</p>
                </div>
            @endforeach
{{--            <div class="card">--}}
{{--                <h3>Community Clean-Up</h3>--}}
{{--                <p>Join us every month for a neighborhood clean-up to keep our area clean and green.</p>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <h3>Monthly Meetings</h3>--}}
{{--                <p>Attend our monthly meetings to discuss community issues and plan future activities.</p>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <h3>Sports Events</h3>--}}
{{--                <p>Participate in our sports events to stay active and meet your neighbors.</p>--}}
{{--            </div>--}}
{{--            <!-- Add more cards as needed -->--}}
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

<!-- Footer -->
<footer class="bg-primary shadow mt-8">
    <div class="container mx-auto px-6 py-4 text-center">
        <p class="text-neutral">&copy; 2024 RW Community. All rights reserved.</p>
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
</script>

</body>
</html>
