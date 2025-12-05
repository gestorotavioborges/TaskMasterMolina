@extends('layout')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0 text-center">Criar Nova Conta</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="name" class="form-control" placeholder="Seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="seu@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha (Mínimo 8 caracteres)</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                        <div class="form-text">Repita a senha para confirmar.</div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                           {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Já tenho conta? Fazer Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
