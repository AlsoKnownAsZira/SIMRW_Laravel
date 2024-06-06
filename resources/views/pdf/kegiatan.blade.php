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
    <title>Undangan Kegiatan</title>
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
<div class="header">
    <div class="kopsurat">
        <div class="header">
            <img class="logo" src="{{ $imageBase64 }}" alt="Logo" />
            <div class="header-text">
                <h4>PEMERINTAH DESA JATIMULYO</h4>
                <h4>KECAMATAN LOWOKWARU KOTA MALANG</h4>
                <h3><b>RUKUN WARGA 05</b></h3>
                
            </div>
        </div>
    </div>
    <hr>
    <div class="title">
        <h3><u>Undangan Kegiatan</u></h3>
    </div>
    
</div>
<div class="content">
    <p>Malang, {{ $tanggal }}</p>
    <p>Nomor: {{ $nomor }}</p>
    <p>Perihal: {{ $perihal }}</p>
    <p>Lampiran: -</p>

    <p>Kepada Yth,</p>
    <p>Bapak/Ibu Warga {{ $role }}</p>
    <p>Di Tempat</p>
    <p>Dengan Hormat,</p>
    <p>
        Dengan ini kami selaku pengurus {{ $role }} RW 05 mengundang seluruh warga {{ $role }} RW 05
        untuk menghadiri kegiatan pada:
    </p>

    <table class="table-no-border">
        <tr>
            <td>Hari, Tanggal</td>
            <td>: {{ $tanggal }}</td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>: {{ $pukul }}</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>: {{ $tempat }}</td>
        </tr>
        <tr>
            <td>Acara</td>
            <td>: {{ $acara }}</td>
        </tr>
    </table>

    <p>
Mengingat pentingnya acara ini, kami mengharapkan kehadiran bapak/ibu tepat waktu.
    </p>

    <p>Demikian undangan ini kami sampaikan. Atas perhatian dan kehadirannya kami ucapkan terimakasih.</p>

    <table class="table-no-border">
        <tr>
            <td class="signature">
                Mengetahui,<br>
                {{ $role }}<br><br><br><br>
                .................................
            </td>
        </tr>
    </table>
</div>
</body>
</html>
