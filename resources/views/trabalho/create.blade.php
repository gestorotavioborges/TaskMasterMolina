@extends('layout')

@section('conteudo')
<div class="mb-3">
    <h4>Nova Tarefa</h4>
    <p class="text-muted">Preencha as informações abaixo.</p>
</div>

<form action="{{ route('trabalho.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome da Tarefa</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Ex: Estudar Laravel">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option value="" selected disabled>Selecione...</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="priority" class="form-label">Prioridade</label>
            <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority">
                <option value="baixa" {{ old('priority') == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ old('priority') == 'media' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ old('priority') == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="due_date" class="form-label">Prazo de Entrega</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <hr>
    
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('trabalho.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Salvar Tarefa
        </button>
    </div>
</form>
@endsection 


