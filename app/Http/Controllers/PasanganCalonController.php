<?php

namespace App\Http\Controllers;

use App\Models\KotakSuara;
use App\Models\KotakSuaraAktuaria;
use App\Models\KotakSuaraPeternakan;
use App\Models\PasanganCalon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;



class PasanganCalonController extends Controller
{
    public function index() {}

    public function insert(): View | RedirectResponse
    {
        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuara::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        return view('pasangan.index', [
            'pasangans' => PasanganCalon::where('kategori', 'bem')->orderBy('norut', 'asc')->get()
        ]);
    }

    public function insertPeter(): View | RedirectResponse
    {
        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuaraPeternakan::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        return view('pasangan.peter', [
            'pasangans' => PasanganCalon::where('kategori', 'peter')->orderBy('norut', 'asc')->get()
        ]);
    }

    public function insertAkt(): View | RedirectResponse
    {
        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuaraAktuaria::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        return view('pasangan.akt', [
            'pasangans' => PasanganCalon::where('kategori', 'akt')->orderBy('norut', 'asc')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        PasanganCalon::create([]);

        return redirect(route(''));
    }


    public function live()
    {
        $paslon = [];
        $countpaslon = [];

        for ($i = 1; $i < PasanganCalon::where('kategori', 'bem')->count() + 1; $i++) {

            $paslon[] = PasanganCalon::where('norut', $i)->where('kategori', 'bem')->first();

            $countpaslon[] = KotakSuara::whereHas('pasanganCalon', function (Builder $query) use ($i) {
                $query->where('norut', $i)->where('kategori', 'bem');
            })->count();
        }

        //--------------------------------------------------------------------------------------------
        $calonpeter = [];
        $countpeter = [];

        for ($i = 1; $i < PasanganCalon::where('kategori', 'peter')->count() + 1; $i++) {

            $calonpeter[] = PasanganCalon::where('norut', $i)->where('kategori', 'peter')->first();

            $countpeter[] = KotakSuaraPeternakan::whereHas('pasanganCalon', function (Builder $query) use ($i) {
                $query->where('norut', $i)->where('kategori', 'peter');
            })->count();
        }

        //--------------------------------------------------------------------------------------------
        $calonakt = [];
        $countakt = [];

        for ($i = 1; $i < PasanganCalon::where('kategori', 'akt')->count() + 1; $i++) {

            $calonakt[] = PasanganCalon::where('norut', $i)->where('kategori', 'akt')->first();

            $countakt[] = KotakSuaraAktuaria::whereHas('pasanganCalon', function (Builder $query) use ($i) {
                $query->where('norut', $i)->where('kategori', 'akt');
            })->count();
        }

        return response()->json([
            "bem" => [
                'namapaslon' => $paslon,
                'count' => $countpaslon,
                'penggunahakpilih' => KotakSuara::count(),
                'jumlahdpt' => User::whereNot('nim', '739165')->count()
            ],
            "peter" => [
                'namapaslon' => $calonpeter,
                'count' => $countpeter,
                'penggunahakpilih' => KotakSuaraPeternakan::count(),
                'jumlahdpt' => User::whereNot('nim', '739165')->where('prodi', 'peter')->count()
            ],
            "akt" => [
                'namapaslon' => $calonakt,
                'count' => $countakt,
                'penggunahakpilih' => KotakSuaraAktuaria::count(),
                'jumlahdpt' => User::whereNot('nim', '739165')->where('prodi', 'akt')->count()
            ]
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
