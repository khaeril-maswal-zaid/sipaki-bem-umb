<?php

namespace App\Http\Controllers;

use App\Models\KotakSuara;
use App\Models\KotakSuaraAktuaria;
use App\Models\KotakSuaraPeternakan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;


class KotakSuaraController extends Controller
{
    public function index(): View | RedirectResponse
    {
        //kalau belum memilih BEM ke laman pemilihan BEM
        if (!KotakSuara::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('pemilihan.insert'));
        }

        //Peternakan dan belum memilih?
        if (!KotakSuaraPeternakan::where('mahasiswa_id', Auth::id())->exists() && Auth::user()->prodi == 'peter') {
            return redirect(route('pemilihan-peter.insert'));
        }

        //Aktuaria dan belum memilih?
        if (!KotakSuaraAktuaria::where('mahasiswa_id', Auth::id())->exists() && Auth::user()->prodi == 'akt') {
            return redirect(route('pemilihan-akt.insert'));
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

    public function storePeter(Request $request): RedirectResponse
    {
        $request->validate([
            'pasangancalon' => 'required||numeric',
        ]);

        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuaraPeternakan::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        KotakSuaraPeternakan::create([
            'pasangan_calon_id' => $request->input('pasangancalon'),
            'mahasiswa_id' =>  Auth::id()
        ]);

        return redirect(route('kotak-suara.index'));
    }

    public function storeAkt(Request $request): RedirectResponse
    {
        $request->validate([
            'pasangancalon' => 'required||numeric',
        ]);

        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuaraAktuaria::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        KotakSuaraAktuaria::create([
            'pasangan_calon_id' => $request->input('pasangancalon'),
            'mahasiswa_id' =>  Auth::id()
        ]);

        return redirect(route('kotak-suara.index'));
    }

    public function live(): View | RedirectResponse
    {
        $nomorUrut = [1, 2]; // Array nomor urut yang akan diproses

        $namapaslon = [];
        $norut = [];
        $count = [];

        foreach ($nomorUrut as $no) {
            $paslon = KotakSuara::whereHas('pasanganCalon', function (Builder $query) use ($no) {
                $query->where('norut', $no);
            })->first();

            if ($paslon && $paslon->pasanganCalon) {
                $namapaslon[] = $paslon->pasanganCalon->pasangan_calon;
                $norut[] = $paslon->pasanganCalon->norut;
                $count[] = KotakSuara::whereHas('pasanganCalon', function (Builder $query) use ($no) {
                    $query->where('norut', $no);
                })->count();
            }
        }


        return view('pemilihan.live', [
            'namapaslon' => $namapaslon,
            'count' => $count,
            'norut' => $norut,
            'penggunahakpilih' => KotakSuara::count()
        ]);
    }
}
