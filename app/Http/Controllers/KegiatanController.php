<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function downloadPdf($id): \Illuminate\Http\Response
    {
        $kegiatan = Kegiatan::with('role')->findOrFail($id);

        Carbon::setLocale('id');
        $formattedDate = Carbon::parse($kegiatan->tanggal)->translatedFormat('l, j F Y');

        $data = [
            'nomor' => $kegiatan->nomor,
            'tanggal' => $formattedDate,
            'pukul' => $kegiatan->pukul,
            'tempat' => $kegiatan->tempat,
            'perihal' => $kegiatan->perihal,
            'acara' => $kegiatan->acara,
            'role' => $kegiatan->role->name,
        ];

        $pdf = PDF::loadView('pdf.kegiatan', $data);

        return $pdf->download('kegiatan.pdf');
    }
}
