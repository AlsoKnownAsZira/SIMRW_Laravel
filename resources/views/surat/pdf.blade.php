<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Surat Details</h1>
    <table>
        <tr>
            <th>Pemohon</th>
            <td>{{ $surat->pemohon }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $surat->nik }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $surat->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $surat->alamat }}</td>
        </tr>
        <tr>
            <th>Perihal</th>
            <td>{{ $perihalLabels[$surat->perihal] ?? $surat->perihal }}</td>
        </tr>
    </table>
</body>
</html>
