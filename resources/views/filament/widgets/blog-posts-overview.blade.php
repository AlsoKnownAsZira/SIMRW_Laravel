<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<div class="card-container">
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><i class="fas fa-users"></i> <b>WARGA</b></h1>
                <p>Total Warga : {{ $userCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><i class="fas fa-money-bill-wave"></i> <b>ANGGARAN</b></h1>
                <p>Total Anggaran : Rp{{ number_format($anggaranCount, 0, ',', '.') }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><i class="fas fa-warehouse"></i> <b>INVENTORI</b></h1>
                <p>Total Inventori : {{ $inventoriCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><i class="fas fa-envelope"></i> <b>SURAT MASUK</b></h1>
                <p>Total Surat : {{ $suratCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <br><br><br><br>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><i class="fas fa-chart-line"></i> <b>VISUALISASI DATA</b></h1>
                <iframe width="1100" height="800" src="https://lookerstudio.google.com/embed/reporting/f198fe14-6822-4fb0-b61e-ea5b9460062a/page/leF2D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
            </div>
        </x-filament::card>
    </x-filament::widget>
</div>



{{-- 
<div class="map-container">
    <x-filament::widget>
        <x-filament::card>
            <h1><b>PETA RW 5</b></h1>
            <!-- Include Leaflet.js -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <!-- Create a div to hold the map -->
            <div id="mapid" style="height: 400px;"></div>

            <!-- Initialize the map -->
            <script>
                var map = L.map('mapid').setView([{{ $mapData['lat'] }}, {{ $mapData['lng'] }}], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 20,
                }).addTo(map);

                L.marker([{{ $mapData['lat'] }}, {{ $mapData['lng'] }}]).addTo(map).bindPopup('RW 5').openPopup();
            </script>
        </x-filament::card>
    </x-filament::widget>
</div> --}}

<style>
    .card-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    
    }

    .card {
        flex: 1;
        margin: 0 10px;
    }

    .map-container {
        margin-top: 20px;
    }
</style>