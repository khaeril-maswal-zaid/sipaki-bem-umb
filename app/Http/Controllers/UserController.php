<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;


class UserController extends Controller
{
    public function index(): View
    {
        $prodis = ['pbing', 'pbi', 'bio', 'pnf', 'peter', 'pwk', 'akt', 'kimia'];
        $user = [];

        foreach ($prodis as $key => $value) {
            $user[] = [
                'count' => User::where('prodi', $value)->count(),
                'pass' => User::where('prodi', $value)->where('password', '')->count(),
                'prodi' => $value
            ];
        }

        return view('dashboard', ['user' => $user]);
    }

    public function store(Request $request): RedirectResponse
    {
        $users = User::select('nim')->where('prodi', $request->input('prodi'))->where('password', '')->get();

        foreach ($users as $key => $value) {
            User::where('nim', $value->nim)->where('prodi', $request->input('prodi'))->whereNot('nim', '739165')->update([
                'email_verified_at' => null,
                'password' => Hash::make($value->nim),
                'remember_token' => Str::random(10),
            ]);
        }

        return redirect(route('dashboard'));
    }
}
