<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all(); // Puxa todos os usuários administradores
        return view('admin_layout.useradmin', compact('admins'));
        
    }

    public function create()
    {
        return view('admin_layout.create_admin'); // Página para criar um novo admin
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('useradmin.index')->with('success', 'Usuário admin criado com sucesso!');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin_layout.edit_admin', compact('admin')); // Página para editar um admin
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Atualiza a senha somente se um novo valor for fornecido
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('useradmin.index')->with('success', 'Usuário admin atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('useradmin.index')->with('success', 'Usuário admin removido com sucesso!');
    }

    // Adicione este método
    public function showLoginForm()
    {
        return view('admin_layout.login_adm'); // Certifique-se de que a view exista
    }

    public function login(Request $request)
    {
        // Validação dos campos de entrada
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tenta autenticar o usuário
        if (auth()->guard('admin')->attempt(['email' => $request->username, 'password' => $request->password])) {
            // Se a autenticação for bem-sucedida, redirecione para a página desejada
            return redirect()->route('useradmin.index'); // Mude para a rota correta
        }

        // Se a autenticação falhar, redirecione de volta com erro
        return redirect()->back()->withErrors(['username' => 'As credenciais fornecidas não correspondem aos nossos registros.']);
    }
}
