<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all(); // Puxa todos os usuários administradores
        return view('admin_layout.userusuario', compact('user'));
        
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('login_cadastro'); // Certifique-se de que o nome está correto
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar o usuário
        Auth::login($users);

        // Redirecionar ou retornar uma resposta

        return redirect('/login')->with('success', 'Cadastro realizado com sucesso. Faça login.');
    }
}
