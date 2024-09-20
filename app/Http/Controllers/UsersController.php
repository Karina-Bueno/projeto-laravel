<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
        return redirect()->back()->withErrors('Usuário ou senha inválidos');
        }
            return to_route('series.index');
    }
}
