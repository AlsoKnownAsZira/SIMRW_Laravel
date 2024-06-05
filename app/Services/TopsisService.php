<?php

namespace App\Services;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

class TopsisService
{
    public function hitung()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $nilaiAlternatifs = NilaiAlternatif::all();

        // Langkah 1: Validasi Data
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $nilai = $nilaiAlternatifs->where('alternatif_id', $alternatif->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->first();

                // Jika nilai untuk kriteria ini tidak ditemukan, abaikan alternatif ini
                if (!$nilai) {
                    $alternatifs = $alternatifs->except($alternatif->id);
                    break;
                }
            }
        }

        // Langkah 2: Perhitungan TOPSIS hanya untuk alternatif yang lengkap
        $matriksKeputusan = [];
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $nilai = $nilaiAlternatifs->where('alternatif_id', $alternatif->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->first();

                if ($nilai) {
                    $matriksKeputusan[$alternatif->id][$kriteria->id] = $nilai->nilai;
                }
            }
        }

        // Langkah 3: Normalisasi Matriks
        $matriksNormalisasi = [];
        foreach ($kriterias as $kriteria) {
            $sumSquares = 0;
            foreach ($alternatifs as $alternatif) {
                $sumSquares += pow($matriksKeputusan[$alternatif->id][$kriteria->id], 2);
            }
            $sqrtSumSquares = sqrt($sumSquares);

            foreach ($alternatifs as $alternatif) {
                $matriksNormalisasi[$alternatif->id][$kriteria->id] = $matriksKeputusan[$alternatif->id][$kriteria->id] / $sqrtSumSquares;
            }
        }

        // Simpan hasil normalisasi matriks untuk ditampilkan
        $results['matriks_normalisasi'] = $matriksNormalisasi;

        // Langkah 4: Matriks Normalisasi Terbobot
        $matriksTerbobot = [];
        foreach ($kriterias as $kriteria) {
            foreach ($alternatifs as $alternatif) {
                $matriksTerbobot[$alternatif->id][$kriteria->id] = $matriksNormalisasi[$alternatif->id][$kriteria->id] * $kriteria->bobot;
            }
        }

        // Simpan hasil matriks terbobot untuk ditampilkan
        $results['matriks_terbobot'] = $matriksTerbobot;

        // Langkah 5: Solusi Ideal Positif dan Negatif
        $idealPositif = [];
        $idealNegatif = [];
        foreach ($kriterias as $kriteria) {
            $nilaiKriteria = [];
            foreach ($alternatifs as $alternatif) {
                $nilaiKriteria[] = $matriksTerbobot[$alternatif->id][$kriteria->id];
            }
            $idealPositif[$kriteria->id] = $kriteria->is_benefit ? max($nilaiKriteria) : min($nilaiKriteria);
            $idealNegatif[$kriteria->id] = $kriteria->is_benefit ? min($nilaiKriteria) : max($nilaiKriteria);
        }

        // Simpan hasil solusi ideal untuk ditampilkan
        $results['ideal_positif'] = $idealPositif;
        $results['ideal_negatif'] = $idealNegatif;

        // Langkah 6: Jarak ke Solusi Ideal
        $jarakPositif = [];
        $jarakNegatif = [];
        foreach ($alternatifs as $alternatif) {
            $sumPositif = 0;
            $sumNegatif = 0;
            foreach ($kriterias as $kriteria) {
                $sumPositif += pow($matriksTerbobot[$alternatif->id][$kriteria->id] - $idealPositif[$kriteria->id], 2);
                $sumNegatif += pow($matriksTerbobot[$alternatif->id][$kriteria->id] - $idealNegatif[$kriteria->id], 2);
            }
            $jarakPositif[$alternatif->id] = sqrt($sumPositif);
            $jarakNegatif[$alternatif->id] = sqrt($sumNegatif);
        }

        // Simpan hasil jarak ke solusi ideal untuk ditampilkan
        $results['jarak_positif'] = $jarakPositif;
        $results['jarak_negatif'] = $jarakNegatif;

        // Langkah 7: Nilai Preferensi
        $preferensi = [];
        foreach ($alternatifs as $alternatif) {
            $preferensi[$alternatif->id] = $jarakNegatif[$alternatif->id] / ($jarakPositif[$alternatif->id] + $jarakNegatif[$alternatif->id]);
        }

        // Langkah 8: Perangkingan
        arsort($preferensi); // Mengurutkan nilai preferensi secara menurun (nilai tertinggi ke terendah)
        $rankedPreferensi = [];
        $rank = 1;
        foreach ($preferensi as $alternatifId => $nilaiPreferensi) {
            $rankedPreferensi[$alternatifId] = [
                'nilai' => $nilaiPreferensi,
                'ranking' => $rank++
            ];
        }

        // Simpan hasil preferensi untuk ditampilkan
        $results['preferensi'] = $rankedPreferensi;

        // Mengembalikan hasil perhitungan dengan detail tiap langkah
        return $results;
    }

    public function getKriterias()
    {
        return Kriteria::all();
    }
}
