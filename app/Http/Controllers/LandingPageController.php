<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function show()
    {
        $kegiatan = Kegiatan::all();
        return view('landing', compact('kegiatan'));
    }
}
