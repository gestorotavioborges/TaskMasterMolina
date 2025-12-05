@extends('layout')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="card-title m-0 text-success"><i class="bi bi-check-circle-fill me-2"></i>Tarefas Concluídas</h3>
    <a href="{{ route('trabalho.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Voltar para Pendentes
    </a>
</div>

@if($trabalhos->count() > 0)
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Tarefa</th>
                    <th>Concluída em</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabalhos as $t)
                <tr class="table-success opacity-75">
                    <td class="text-decoration-line-through">{{ $t->name }}</td>
                    <td>{{ $t->updated_at->format('d/m/Y H:i') }}</td>
                    <td class="text-end">
                        <form action="{{ route('trabalho.reabrir', $t->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-dark" title="Reabrir Tarefa">
                                <i class="bi bi-arrow-counterclockwise"></i> Reabrir
                            </button>
                        </form>
                        
                        <form action="{{ route('trabalho.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir permanentemente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
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
        <p class="text-muted">Nenhuma tarefa concluída ainda.</p>
    </div>
@endif
@endsection