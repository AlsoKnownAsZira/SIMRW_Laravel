<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Bansos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h2, h3 {
            margin-top: 20px;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <h1>SURAT PERNYATAAN</h1>

    <p>Nomor: [Nomor Surat]</p>

    <p>Saya yang bertanda tangan di bawah ini:</p>

    <p>Nama: [Nama Lengkap]</p>
    <p>Tempat/Tanggal Lahir: [Tempat, Tanggal Lahir]</p>
    <p>NIK: [Nomor Induk Kependudukan]</p>
    <p>Alamat: [Alamat Lengkap]</p>
    <p>Pekerjaan: [Pekerjaan]</p>

    <p>Dengan ini menyatakan bahwa saya:</p>
    <ul>
        <li>Tidak memiliki penghasilan tetap atau memiliki penghasilan yang tidak mencukupi untuk memenuhi kebutuhan dasar sehari-hari.</li>
        <li>Bertanggung jawab atas [jumlah] tanggungan keluarga yang terdiri dari [jumlah] anak dan [jumlah] anggota keluarga lainnya.</li>
        <li>Tinggal di rumah dengan kondisi fisik yang tidak layak huni, dengan jenis lantai [sebutkan jenis lantai, misalnya tanah/semen].</li>
        <li>Membayar biaya listrik per bulan sebesar [jumlah biaya] yang cukup membebani keuangan keluarga.</li>
        <li>Bekerja sebagai [pekerjaan] dengan penghasilan yang tidak mencukupi untuk kehidupan sehari-hari.</li>
        <li>Berusia [usia] tahun yang menjadikan saya tergolong dalam kelompok rentan.</li>
        <li>Memiliki cacat fisik berupa [sebutkan jenis cacat fisik, jika ada].</li>
    </ul>

    <p>Berdasarkan kondisi tersebut, saya dengan ini menyatakan bahwa saya berhak untuk menerima bantuan sosial dari [Nama Lembaga/Pemerintah Daerah] untuk membantu meringankan beban ekonomi keluarga saya.</p>

    <p>Saya bersedia memberikan informasi lebih lanjut dan menerima kunjungan untuk verifikasi apabila diperlukan. Segala informasi yang saya berikan adalah benar adanya, dan saya bersedia menerima sanksi sesuai peraturan yang berlaku apabila terbukti memberikan informasi yang tidak benar.</p>

    <p>Demikian surat pernyataan ini saya buat dengan sebenar-benarnya untuk digunakan sebagaimana mestinya.</p>

    <p>[Tempat], [Tanggal]</p>

    <p>Hormat saya,</p>
    <p>[Nama Lengkap]</p>

    <p>Mengetahui:</p>

    <p>[Nama Kepala Desa/Lurah]</p>
    <p>Kepala Desa/Lurah</p>
    <p>[Tanda Tangan & Stempel]</p>

    <div class="page-break"></div>

    <h1>Lampiran: Hasil Perhitungan TOPSIS</h1>
    @foreach ($alternatifData as $data)
        <h2>Alternatif: {{ $data['nama'] }}</h2>

        <!-- Matriks Normalisasi -->
        <h3>Matriks Normalisasi</h3>
        <table>
            <thead>
                <tr>
                    @foreach ($kriterias as $kriteria)
                        <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data['matriks_normalisasi'] as $nilai)
                        <td>{{ $nilai }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!-- Matriks Terbobot -->
        <h3>Matriks Terbobot</h3>
        <table>
            <thead>
                <tr>
                    @foreach ($kriterias as $kriteria)
                        <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data['matriks_terbobot'] as $nilai)
                        <td>{{ $nilai }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!-- Jarak ke Solusi Ideal -->
        <h3>Jarak ke Solusi Ideal</h3>
        <table>
            <thead>
                <tr>
                    <th>Jarak Positif</th>
                    <th>Jarak Negatif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data['jarak_positif'] }}</td>
                    <td>{{ $data['jarak_negatif'] }}</td>
                </tr>
            </tbody>
        </table>

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
