<?php

namespace App\Http\Controllers;

use App\Models\KotakSuara;
use App\Models\PasanganCalon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;


class KotakSuaraController extends Controller
{
    public function index(): View | RedirectResponse
    {
        //kalau belum memilih ke laman pemilihan
        if (!KotakSuara::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('pemilihan.insert'));
        }
        return view('pemilihan.index');
    }

    public function store(Request $request): RedirectResponse
    {
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

    public function live(): View | RedirectResponse
    {
        $paslon1 = KotakSuara::whereHas('pasanganCalon', function (Builder $query) {
            // Menggunakan whereIn untuk mencari lebih dari satu nomor urut
            $query->where('norut', 1); // Misalnya, mencakup calon dengan nomor urut 1 dan 2
        });

        $paslon2 = KotakSuara::whereHas('pasanganCalon', function (Builder $query) {
            // Menggunakan whereIn untuk mencari lebih dari satu nomor urut
            $query->where('norut', 2); // Misalnya, mencakup calon dengan nomor urut 1 dan 2
        });

        $namapaslon = [
            $paslon1->first()->pasanganCalon->pasangan_calon,
            $paslon2->first()->pasanganCalon->pasangan_calon,
        ];

        $count =  [
            $paslon1->count(),
            $paslon2->count()
        ];

        return view('pemilihan.live', [
            'namapaslon' => $namapaslon,
            'count' => $count,
        ]);
    }
}
