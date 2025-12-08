@extends('layout')

@section('conteudo')
<div class="row">
    <div class="col-md-7 mb-4">
        <div class="mb-3">
            <h4>Editar Tarefa: <span class="text-primary">{{ $trabalho->name }}</span></h4>
        </div>

        <form action="{{ route('trabalho.update', $trabalho->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $trabalho->name) }}">
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-select" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $trabalho->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="priority" class="form-label">Prioridade</label>
                    <select class="form-select" id="priority" name="priority">
                        <option value="baixa" {{ old('priority', $trabalho->priority) == 'baixa' ? 'selected' : '' }}>Baixa</option>
                        <option value="media" {{ old('priority', $trabalho->priority) == 'media' ? 'selected' : '' }}>Média</option>
                        <option value="alta" {{ old('priority', $trabalho->priority) == 'alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="due_date" class="form-label">Prazo de Entrega</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $trabalho->due_date?->format('Y-m-d')) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $trabalho->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('trabalho.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning text-white">
                    <i class="bi bi-arrow-repeat"></i> Atualizar
                </button>
            </div>
        </form>
    </div>

    <div class="col-md-5">
        <div class="card bg-light border-0 h-100">
            <div class="card-header bg-white border-bottom-0 pt-3">
                <h5 class="card-title fw-bold"><i class="bi bi-chat-left-text me-2"></i>Comentários</h5>
            </div>
            
            <div class="card-body overflow-auto" style="max-height: 500px;">
                @if($trabalho->comments->count() > 0)
                    @foreach($trabalho->comments->sortByDesc('created_at') as $comment)
                        <div class="d-flex gap-2 mb-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random&size=32" class="rounded-circle" width="32" height="32">
                            <div class="bg-white p-3 rounded shadow-sm w-100">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong class="small">{{ $comment->user->name }}</strong>
                                    <small class="text-muted" style="font-size: 0.75rem;">{{ $comment->created_at->format('d/m H:i') }}</small>
                                </div>
                                <p class="mb-0 text-secondary small">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-muted py-4">
                        <i class="bi bi-chat-dots fs-1 d-block mb-2 opacity-50"></i>
                        <p class="small">Nenhum comentário ainda. Seja o primeiro!</p>
                    </div>
                @endif
            </div>

            <div class="card-footer bg-white border-top-0 p-3">
                <form action="{{ route('comments.store', $trabalho->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Escreva um comentário..." required>
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
