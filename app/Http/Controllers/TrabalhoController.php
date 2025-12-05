<?php

namespace App\Http\Controllers;

use App\Models\Trabalho;
use Illuminate\Http\Request;
use App\Http\Requests\TrabalhoRequest;

class TrabalhoController extends Controller
{
    public function index()
    {
        $trabalho = Trabalho::where('is_done', false)
            ->orderBy('due_date', 'asc')
            ->get();
        
        return view('trabalho.index', ['trabalhos' => $trabalho]);
    }

    public function concluidos()
    {
        $trabalho = Trabalho::where('is_done', true)->get();
        return view('trabalho.concluidos', ['trabalhos' => $trabalho]);
    }

    public function create()
    {
        return view('trabalho.create');
    }

    public function store(TrabalhoRequest $request)
    {
        $trabalho = Trabalho::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'priority' => $request['priority'],
            'due_date' => $request['due_date'],
            'is_done' => false
        ]);

        if($trabalho) {
            return redirect()->route('trabalho.index')->with('success', 'Tarefa cadastrada com sucesso!!!');
        } else {
            return redirect()->route('trabalho.index')->with('error', 'Não foi possível cadastrar a tarefa.');
        }   
    }

    public function edit($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        return view('trabalho.update', ['trabalho' => $trabalho]);
    }

    public function update(TrabalhoRequest $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);

        $atualizou = $trabalho->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'priority' => $request['priority'],
            'due_date' => $request['due_date']
        ]);

        if($atualizou) {
            return redirect()->route('trabalho.index')->with('success', 'Tarefa atualizada com sucesso!!!');
        } else {
            return redirect()->route('trabalho.index')->with('error', 'Não foi possível atualizar a tarefa.');
        }   
    }

    public function destroy($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $deletou = $trabalho->delete();

        if($deletou) {
            return redirect()->back()->with('success', 'Tarefa removida com sucesso!!!');
        } else {
            return redirect()->back()->with('error', 'Não foi possível remover a tarefa.');
        }
    }

    public function marcarConcluido($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $trabalho->update(['is_done' => true]);

        return redirect()->route('trabalho.index')->with('success', 'Parabéns! Tarefa concluída.');
    }

    public function reabrir($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $trabalho->update(['is_done' => false]);

        return redirect()->route('trabalho.concluidos')->with('success', 'Tarefa reaberta.');
    }
}
