{{-- <!DOCTYPE html>
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
</html> --}}

@php

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$imagePath = public_path('images/malang.png');
$imageData = base64_encode(file_get_contents($imagePath));
$imageBase64 = 'data:image/jpg;base64,' . $imageData;

@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Pengantar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            /* border: 1px solid #000; */
        }

        .header {
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
            margin-right: 70px; 
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

        .title h2,
        .title p {
            margin: 5px 0;
        }

        .content p {
            text-align: justify;
            margin: 10px 0;
        }

        .center-table {
            margin: 0 auto 20px auto;
            /* Letakkan tabel di tengah secara horizontal dan beri jarak bawah */
        }

        table td {
            padding: 5px;
        }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: flex-end;
            /* Meletakkan footer ke kanan */
        }

        .signature {
            text-align: right;
            width: 30%;
            margin-left: auto; /* This will push the signature to the right */
        }

        .signature .sign {
            margin-top: 60px;
        }

        .kopsurat {
            margin: 0 auto;
            background-color: white;
            padding: 20px;
        }

        .judul {
            text-align: center;
            line-height: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="kopsurat">
            <div class="header">
                <img class="logo" src="{{ $imageBase64 }}" alt="Logo" />
                {{-- <link rel="icon" type="image/x-icon" href="{{ URL::asset('malang.jpg') }}" /> --}}
                <div class="header-text">
                    <h2>PEMERINTAH KOTA MALANG</h2>
                    <h3>KECAMATAN LOWOKWARU</h3>
                    <h3>DESA JATIMULYO</h3>
                    <p>RW 005</p>
                </div>
            </div>
        </div>
        <table width="100%" style="border-bottom: 3px solid #000; padding: 2px"></table>

        <div class="title">
            <h2>SURAT PENGANTAR</h2>
            <p>Nomor Reg : {{ rand(100,999) }}/{{ rand(1000,9999) }}/{{ rand(100,999) }}.{{ rand(0,9) }}.{{ rand(0,9) }}.{{ rand(0,9) }}/{{ rand(100,999) }}</p>        </div>

        <div class="content">
            <p>
                Yang bertanda tangan di bawah ini Ketua RW 5 Desa Jatimulyo Kecamatan
                Lowokwaru Kota Malang. Menerangkan dengan sebenar-benarnya bahwa
                orang tersebut di bawah ini :
            </p>

            <table class="center-table">
                <tr>
                    <td>Nama</td>
                    <td>
                        : {{ $surat->pemohon }}
                        
                    </td>
                </tr>
                <tr>
                    <td>NIK</td>
                        
                        <td>: {{ $surat->nik }}</td>                    </td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td>
                        :
                        {{ $surat->alamat  }}
                    </td>
                </tr>
               
            </table>

            <p>
                Orang tersebut benar-benar penduduk RW 05
                tinggal di alamat seperti tersebut diatas. 
                Adapun surat pengantar ini diberikan kepada 
                yang bersangkutan sebagai lampiran untuk mengurus
                {{ $perihalLabels[$surat->perihal] ?? $surat->perihal }}
            </p>
            <p>
                Demikian surat ini dibuat dengan sebenar-benarnya dan
                untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <div class="footer">
            <div class="signature">
                <p>Mengetahui</p>
                <p>Malang, {{ now()->format('d-m-Y') }}</p>
                <p>KETUA RW 05</p>
                <br><br><br>
                <div class="sign">(KETUA RW 05)</div>
            </div>
        </div>
    </div>
</body>

</html>