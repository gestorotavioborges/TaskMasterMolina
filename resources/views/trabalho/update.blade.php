@extends('layout')

@section('conteudo')
<div class="mb-3">
    <h4>Editar Tarefa: <span class="text-primary">{{ $trabalho->name }}</span></h4>
</div>

<form action="{{ route('trabalho.update', $trabalho->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome da Tarefa</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $trabalho->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="priority" class="form-label">Prioridade</label>
            <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority">
                <option value="baixa" {{ old('priority', $trabalho->priority) == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ old('priority', $trabalho->priority) == 'media' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ old('priority', $trabalho->priority) == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="due_date" class="form-label">Prazo de Entrega</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date', $trabalho->due_date?->format('Y-m-d')) }}">
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $trabalho->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <hr>
    
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('trabalho.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-warning text-white">
            <i class="bi bi-arrow-repeat"></i> Atualizar
        </button>
    </div>
</form>
@endsection