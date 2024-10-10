<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $users = User::select('nim')->where('prodi', $request->input('prodi'))->get();

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
