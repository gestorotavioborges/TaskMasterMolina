@extends('layout')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="card-title m-0">Lista de Tarefas Pendentes</h3>
    <a href="{{ route('trabalho.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Nova Tarefa
    </a>
</div>

@if($trabalhos->count() > 0)
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Prioridade</th>
                    <th>Prazo</th>
                    <th>Tarefa</th>
                    <th>Descrição</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabalhos as $t)
                <tr class="{{ $t->due_date < now() ? 'table-danger' : '' }}">
                    <td>
                        @if($t->priority == 'alta')
                            <span class="badge bg-danger">Alta</span>
                        @elseif($t->priority == 'media')
                            <span class="badge bg-warning text-dark">Média</span>
                        @else
                            <span class="badge bg-success">Baixa</span>
                        @endif
                    </td>
                    <td class="{{ $t->due_date < now() ? 'fw-bold text-danger' : '' }}">
                        {{ $t->due_date ? $t->due_date->format('d/m/Y') : '-' }}
                        @if($t->due_date < now()) <i class="bi bi-exclamation-circle-fill ms-1" title="Atrasado!"></i> @endif
                    </td>
                    <td class="fw-bold">{{ $t->name }}</td>
                    <td>{{ Str::limit($t->description, 40) }}</td>
                    
                    <td class="text-end">
                        <form action="{{ route('trabalho.marcarConcluido', $t->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-success" title="Concluir Tarefa">
                                <i class="bi bi-check-lg"></i>
                            </button>
                        </form>

                        <a href="{{ route('trabalho.edit', $t->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('trabalho.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="text-center py-5">
        <p class="text-muted">Nenhuma tarefa pendente. Tudo em dia! 😎</p>
        <a href="{{ route('trabalho.create') }}" class="btn btn-outline-primary">Cadastrar Nova Tarefa</a>
    </div>
@endif
@endsection

