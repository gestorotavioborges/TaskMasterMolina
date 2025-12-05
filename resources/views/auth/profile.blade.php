@extends('layout')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-person-gear me-2"></i>Meu Perfil</h4>
                <a href="{{ route('trabalho.index') }}" class="btn btn-sm btn-light">Voltar</a>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone / WhatsApp</label>
                        <input type="text" name="phone" class="form-control" 
                               value="{{ old('phone', $user->phone) }}" 
                               placeholder="(00) 00000-0000">
                    </div>

                    <hr>
                    <h5 class="text-muted mb-3">Alterar Senha <small class="fs-6 fw-normal">(Deixe em branco para manter a atual)</small></h5>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nova Senha</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirmar Nova Senha</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-lg"></i> Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection