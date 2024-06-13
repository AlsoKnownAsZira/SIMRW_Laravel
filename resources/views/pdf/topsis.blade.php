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
    <title>Surat Pernyataan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.4;
        }

        .header, .footer {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
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

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
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
        <h3><u>Surat Pernyataan</u></h3>
        <h3><u>Bantuan Sosial</u></h3>
    </div>
</div>
<div class="content">
    <p>Perihal  : Penerima Bantuan Sosial</p>
    <p>Lampiran : 1</p>

    <Bapak>Kepada Yth, Bapak/Ibu Warga RW 05</p>
    <p>Di Tempat</p>
    <p>Dengan Hormat,</p>
    <p>
        Dengan ini kami selaku pengurus Bantuan Sosial RW 05 menyatakan bahwa yang berhak menerima
        Bantuan Sosial:
    </p>
    <ul>
        <li>Tidak memiliki penghasilan tetap atau memiliki penghasilan yang tidak mencukupi untuk memenuhi kebutuhan dasar sehari-hari.</li>
        <li>Bertanggung jawab atas tanggungan keluarga.</li>
        <li>Tinggal di rumah dengan kondisi fisik yang tidak layak huni.</li>
        <li>Membayar biaya listrik per bulan yang cukup membebani keuangan keluarga.</li>
        <li>Bekerja dengan penghasilan yang tidak mencukupi untuk kehidupan sehari-hari.</li>
        <li>Berusia yang tergolong dalam kelompok rentan.</li>
        <li>Memiliki maupun tidak memiliki cacat fisik.</li>
    </ul>

    <Demikian>Berdasarkan kondisi tersebut, dengan ini menyatakan bahwa orang berikut berhak untuk menerima bantuan sosial dari RW 05
        untuk membantu meringankan beban ekonomi keluarga.Demikian surat pernyataan ini dibuat dengan sebenar-benarnya untuk digunakan sebagaimana mestinya.</p>

    <table class="table-no-border">
        <tr>
            <td class="signature">
                Mengetahui,<br>
                Ketua RW 05<br><br><br><br>
                .................................
            </td>
        </tr>
    </table>
</div>

    <div class="page-break"></div>

    <h1>Lampiran: Hasil Perhitungan TOPSIS</h1>
    @foreach ($alternatifData as $data)
        <h2>Alternatif: {{ $data['nama'] }}</h2>

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
                    <td>{{ $data['nilai_preferensi'] }}</td>
                    <td>{{ $data['rangking'] }}</td>
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
</body>
</html>
