<?php

namespace App\Http\Controllers;

use App\Models\KotakSuara;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class KotakSuaraController extends Controller
{
    public function index() : View | RedirectResponse {
        //kalau belum memilih ke laman pemilihan
        if (!KotakSuara::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('pemilihan.insert'));
        }
        return view('pemilihan.index');
    }

    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'pasangancalon' => 'required||numeric',
        ]);

        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuara::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        KotakSuara::create([
            'pasangan_calon_id' => $request->input('pasangancalon'),
            'mahasiswa_id' =>  Auth::id()
        ]);

        return redirect(route('kotak-suara.index'));
    }
}
