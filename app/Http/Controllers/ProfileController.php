<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Mostrar formulário de perfil
    public function edit()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    // Atualizar os dados do usuário
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20', // Validação do novo campo telefone
            'password' => 'nullable|min:8|confirmed' // Senha é opcional
        ]);

        // Atualiza as informações no objeto do usuário
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone; // Salva o telefone

        // Só altera a senha se o campo estiver preenchido
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Grava tudo no banco de dados
        $user->save();

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }
}