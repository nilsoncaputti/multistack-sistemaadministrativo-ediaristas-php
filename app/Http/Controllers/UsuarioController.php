<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    // Listar Usuários
    public function index()
    {
        $usuarios = User::paginate(5);

        return view('usuarios.index', [
            'usuarios' => $usuarios
        ]);
    }

    // Mostra formulário em branco para criação de Usuários
    public function create()
    {
        return view('usuarios.create');
    }

    // Salva Usuários no Banco de Dados
    public function store(UsuarioRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')
            ->with('mensagem', 'Usuário criado com sucesso!');
    }

    // Mostrar um Usuários específico
    public function show($id)
    {
        //
    }

    // Mostar formulário de edição já preenchido com dados do usuário
    public function edit(User $usuario)
    {
        return view('usuarios.edit', [
            'usuario' => $usuario
        ]);
    }

    // Atualiza registro no Banco de Dados
    public function update(UsuarioRequest $request, User $usuario)
    {
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')
            ->with('mensagem', 'Usuário editado com sucesso!');
    }

    // Excluir Usuário
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('mensagem', 'Usuário apagado com sucesso!');
    }
}
