<?php

namespace App\Http\Controllers;

use App\Models\KotakSuara;
use App\Models\PasanganCalon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class PasanganCalonController extends Controller
{
    public function index() {

    }

    public function insert() : View | RedirectResponse {
        //kalau sudah memilih ke laman sudah memilih
        if (KotakSuara::where('mahasiswa_id', Auth::id())->exists()) {
            return redirect(route('kotak-suara.index'));
        }

        return view('pasangan.index', [
            'pasangans' => PasanganCalon::orderBy('norut', 'asc')->get()
        ]);
    }

    public function store(Request $request) : RedirectResponse {
        PasanganCalon::create([

        ]);

        return redirect(route(''));
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
