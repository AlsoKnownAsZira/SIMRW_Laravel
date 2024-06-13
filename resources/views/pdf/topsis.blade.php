@php

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$imagePath = public_path('images/malang.png');
$imageData = base64_encode(file_get_contents($imagePath));
$imageBase64 = 'data:image/jpg;base64,' . $imageData;

@endphp

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.4;
        }

        .header, .footer {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            /* text-align: center; */
        }

        .header img.logo {
            width: 100px;
            height: auto;
            margin-top: 10px;
            float: left;
        }

        .header-text {
            margin-right: 100px;
            text-align: center;
            flex-grow: 1;
        }

        .header-text h2,
        .header-text h3,
        .header-text p {
            margin: 5px 0;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin: 0 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-no-border, .table-no-border th, .table-no-border td {
            border: none;
        }

        .signature {
            width: 50%;
            text-align: right;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="header">
        <img class="logo" src="{{ $imageBase64 }}" alt="Logo" />
        <div class="header-text">
            <h4>PEMERINTAH DESA JATIMULYO</h4>
            <h4>KECAMATAN LOWOKWARU KOTA MALANG</h4>
            <h3><b>RUKUN WARGA 05</b></h3>
        </div>
    </div>
    <hr>
    <div class="title">
        <h3><u>Surat Pernyataan</u></h3>
        <h3><u>Bantuan Sosial</u></h3>
    </div>
    <div class="content">
        <p>Perihal  : Penerima Bantuan Sosial</p>
        <p>Lampiran : 1</p>

        <p>Kepada Yth,</p>
        <p>Bapak/Ibu Warga RW 05</p>
        <p>Di Tempat</p>
        <p>Dengan Hormat,</p>
        <p>
            Dengan ini kami selaku pengurus Bantuan Sosial Warga RW 05 memberitahukan bahwa yang berhak menerima
            Bantuan Sosial adalah sebagai berikut:
        </p>
        <h2>Nama: {{ $nama }}</h2>

        <p>Demikian surat ini kami sampaikan. Atas perhatian dan kehadirannya kami ucapkan terimakasih.</p>

        <div class="signature">
            Mengetahui,<br>
            Ketua RW 05<br><br><br><br>
            .................................
        </div>
    </div>

    <div class="page-break"></div>

    <div class="content">
        <h1>Lampiran: Hasil Perhitungan TOPSIS</h1>
        @foreach ($alternatifData as $altData)
            <h2>Alternatif: {{ $altData['nama'] }}</h2>

            <!-- Nilai Preferensi -->
            <h3>Nilai Preferensi dan Rangking</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nilai Preferensi</th>
                        <th>Rangking</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $altData['nilai_preferensi'] }}</td>
                        <td>{{ $altData['rangking'] }}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach

        <!-- Solusi Ideal -->
        <h2>Solusi Ideal</h2>
        <table>
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Ideal Positif</th>
                    <th>Ideal Negatif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $kriteria)
                    <tr>
                        <td>{{ $kriteria->nama }}</td>
                        <td>{{ $ideal_positif[$kriteria->id] }}</td>
                        <td>{{ $ideal_negatif[$kriteria->id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
