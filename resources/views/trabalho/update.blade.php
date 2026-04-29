@extends('layout')

@section('conteudo')
<div class="row">
    
    <div class="col-md-6">
        
        <div class="card p-4 mb-4 border-0 shadow-sm">
            <h4 class="mb-3 fw-bold">Editar Tarefa</h4>
            
            <form action="{{ route('trabalho.update', $trabalho->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Nome da Tarefa</label>
                    <input type="text" name="name" class="form-control" value="{{ $trabalho->name }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $trabalho->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prioridade</label>
                        <select name="priority" class="form-select">
                            <option value="baixa" {{ $trabalho->priority == 'baixa' ? 'selected' : '' }}>Baixa</option>
                            <option value="media" {{ $trabalho->priority == 'media' ? 'selected' : '' }}>Média</option>
                            <option value="alta" {{ $trabalho->priority == 'alta' ? 'selected' : '' }}>Alta</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prazo</label>
                    <input type="date" name="due_date" class="form-control" value="{{ $trabalho->due_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control" rows="3">{{ $trabalho->description }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">Salvar Alterações</button>
                    <a href="{{ route('trabalho.index') }}" class="btn btn-outline-secondary">Voltar</a>
                </div>
            </form>
        </div>

        <div class="card p-4 mb-4 border-0 shadow-sm">
            <h5 class="fw-bold mb-3"><i class="bi bi-paperclip"></i> Arquivos & Anexos</h5>

            <div class="list-group mb-3">
                @foreach($trabalho->attachments as $file)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="text-decoration-none text-truncate" style="max-width: 80%;">
                            <i class="bi bi-file-earmark-text me-2"></i> {{ $file->file_name }}
                        </a>
                        <form action="{{ route('attachment.destroy', $file->id) }}" method="POST" onsubmit="return confirm('Apagar este arquivo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
                @if($trabalho->attachments->count() == 0)
                    <p class="text-muted small text-center py-2 border rounded bg-light">Nenhum arquivo anexado.</p>
                @endif
            </div>

            <form action="{{ route('attachment.store', $trabalho->id) }}" method="POST" enctype="multipart/form-data" class="d-flex gap-2 align-items-center">
                @csrf
                <input type="file" name="file" class="form-control form-control-sm" required>
                <button type="submit" class="btn btn-sm btn-secondary">
                    <i class="bi bi-upload"></i> Enviar
                </button>
            </form>
        </div>

    </div>

    <div class="col-md-6">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3">
                <i class="bi bi-chat-left-text me-2"></i> Comentários
            </div>
            <div class="card-body overflow-auto bg-light" style="max-height: 500px;">
                @foreach($trabalho->comments as $comment)
                    <div class="d-flex mb-3">
                        <div class="me-2">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random" class="rounded-circle shadow-sm" width="35" height="35">
                        </div>
                        <div>
                            <div class="bg-white p-3 rounded shadow-sm">
                                <strong class="d-block small text-primary mb-1">{{ $comment->user->name }}</strong>
                                <span class="text-dark">{{ $comment->content }}</span>
                            </div>
                            <small class="text-muted ms-1" style="font-size: 0.75rem;">
                                {{ $comment->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                @endforeach
                
                @if($trabalho->comments->count() == 0)
                    <div class="text-center text-muted mt-5">
                        <i class="bi bi-chat-square-dots fs-1"></i>
                        <p class="mt-2">Seja o primeiro a comentar.</p>
                    </div>
                @endif
            </div>
            <div class="card-footer bg-white p-3">
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

