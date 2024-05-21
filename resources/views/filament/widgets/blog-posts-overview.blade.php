<div class="card-container">
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><b>WARGA</b></h1>
                <p>Total Warga : {{ $userCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><b>ANGGARAN</b></h1>
                <p>Total Anggaran : {{ $userCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><b>INVENTORI</b></h1>
                <p>Total Inventori : {{ $userCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
    <x-filament::widget>
        <x-filament::card class="card">
            <div class="filament-widgets-user-overview">
                <h1><b>SURAT MASUK</b></h1>
                <p>Total Surat : {{ $userCount }}</p>
            </div>
        </x-filament::card>
    </x-filament::widget>
</div>




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
</div>

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