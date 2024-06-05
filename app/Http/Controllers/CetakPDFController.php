<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TopsisService;
use App\Models\Alternatif;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakPDFController extends Controller
{
    public function cetakPdf(Request $request)
    {
        // Ambil data yang dicentang dari form
        $alternatifIds = $request->input('cetak');

        // Validasi jika tidak ada alternatif yang dipilih
        if (!$alternatifIds) {
            return redirect()->back()->with('error', 'Tidak ada alternatif yang dipilih untuk dicetak.');
        }

        // Ambil data untuk mencetak PDF
        $topsisService = new TopsisService();
        $hasilTopsis = $topsisService->hitung();
        $kriterias = $topsisService->getKriterias();
        $alternatifData = [];

        // Filter data alternatif yang akan dicetak
        foreach ($alternatifIds as $alternatifId) {
            $alternatif = Alternatif::findOrFail($alternatifId);
            $alternatifData[] = [
                'id' => $alternatifId,
                'nama' => $alternatif->nama,
                'nilai_preferensi' => $hasilTopsis['preferensi'][$alternatifId]['nilai'],
                'rangking' => $hasilTopsis['preferensi'][$alternatifId]['ranking'],
                'matriks_normalisasi' => $hasilTopsis['matriks_normalisasi'][$alternatifId],
                'matriks_terbobot' => $hasilTopsis['matriks_terbobot'][$alternatifId],
                'jarak_positif' => $hasilTopsis['jarak_positif'][$alternatifId],
                'jarak_negatif' => $hasilTopsis['jarak_negatif'][$alternatifId]
            ];
        }

        // Load view dan hasilnya ke PDF
        $pdf = Pdf::loadView('pdf.topsis', [
            'alternatifData' => $alternatifData,
            'kriterias' => $kriterias,
            'ideal_positif' => $hasilTopsis['ideal_positif'],
            'ideal_negatif' => $hasilTopsis['ideal_negatif'],
        ]);

        // Unduh PDF dengan nama file
        return $pdf->download('topsis.pdf');
    }
}
