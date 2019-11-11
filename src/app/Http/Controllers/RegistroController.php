<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required'
        ]);    

        $user_info = $request->except('_token');
        $user_info['password'] = Hash::make($user_info['password']);
        $user_create = User::create($user_info);

        Auth::login($user_create);

        return \redirect()->route('listar_series');
    }
}
