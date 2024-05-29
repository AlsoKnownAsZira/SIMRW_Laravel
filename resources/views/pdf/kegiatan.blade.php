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
            text-align: center;
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
    <h4>PEMERINTAH DESA JATIMULYO</h4>
    <h4>KECAMATAN LOWOKWARU KOTA MALANG</h4>
    <h3><b>RUKUN WARGA 05</b></h3>
    <hr>
    <h3><u>Undangan Kegiatan</u></h3>
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
