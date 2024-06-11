<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function show()
    {
        $kegiatan = Kegiatan::all();
        return view('landing', compact('kegiatan'));
    }

    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::guard('filament')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }
}
