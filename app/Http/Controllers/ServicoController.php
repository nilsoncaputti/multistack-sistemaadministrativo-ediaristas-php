<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;

class ServicoController extends Controller
{
    // Lista os serviços
    public function index()
    {
        $servicos = Servico::paginate(10);

        return view('servicos.index')->with('servicos', $servicos);
    }

    // Mostra o form vazio para criação
    public function create()
    {
        return view('servicos.create');
    }

    // Cria um novo registro no banco de dados
    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');

        Servico::create($dados);

        return redirect()->route('servicos.index')->with('mensagem', 'Serviço criado com sucesso!');
    }

    // Mostra o formulário preenchido para alteração
    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with('servico', $servico);
    }

    // Atualiza um registro no banco de dados
    public function update(Servico $servico, ServicoRequest $request)
    {
        $dados = $request->except(['_token', '_method']);

        $servico->update($dados);

        return redirect()->route('servicos.index')->with('mensagem', 'Serviço atualizado com sucesso!');
    }
}
