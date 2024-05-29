<!DOCTYPE html>
<html>
<head>
    <title>Surat Pengantar</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
        }

        .header, .footer {
            text-align: center;
        }

        .content {
            margin: 0 50px;
        }
        th {
    font-weight: normal;
    text-align: left;
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
    <h3><u>Surat Pengantar</u></h3>
</div>
<div class="content">
   <p>&nbsp;Yang bertanda tangan dibawah ini Ketua RW 05 Kelurahan Jatimulyo, Kecamatan Lowokwaru - Kota Malang menerangkan bahwa:</p>
    <table class="table-no-border">
        <tr>
            <th>Pemohon</th>
            <td>:{{ $surat->pemohon }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>:{{ $surat->nik }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>:{{ $surat->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:{{ $surat->alamat }}</td>
        </tr>
        <tr>
            <th>Perihal</th>
            <td>:Mengurus {{ $perihalLabels[$surat->perihal] ?? $surat->perihal }}</td>
        </tr>
    </table>

    <p>
        &nbsp;Adalah benar bahwa yang bersangkutan pada saat ini berdomisili di lingkungan kami.
    </p>
    
    <p> &nbsp;Demikianlah surat pengantar ini dibuat untuk digunakan sebagaimana mestinya.   </p>
    <table class="table-no-border">
        <tr>
            <td class="signature">
                <p>Malang, {{ now()->format('d-m-Y') }}</p>
                KETUA RW 05<br><br><br><br>
                ...................................
                <br>
                (NAMA KETUA RW 05)
            </td>
        </tr>
    </table>
</div>
</body>
</html>
