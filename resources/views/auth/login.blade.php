@extends('layout')

@section('conteudo')

<style>
    .user-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .user-card:hover {
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
    .feature-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.5rem;
        transition: transform 0.3s;
    }
    .feature-box:hover .feature-icon {
        transform: rotate(15deg) scale(1.1);
    }
</style>

<div class="row align-items-center my-4">
    
    <div class="col-md-5 mb-4 mb-md-0">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white p-4">
                <h4 class="mb-0 text-center fw-bold">Acesso ao Sistema</h4>
                <p class="text-center mb-0 small text-white-50">Entre para gerenciar suas tarefas</p>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="seu@email.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="******" required>
                        </div>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center bg-light p-3">
                <span class="text-muted">Novo por aqui?</span>
                <a href="{{ route('register') }}" class="text-decoration-none fw-bold ms-1">Crie sua conta grátis</a>
            </div>
        </div>
    </div>

    <div class="col-md-7 ps-md-5">
        <div class="text-center text-md-start mb-4">
            <h2 class="fw-bold text-primary">Junte-se a milhares de organizados</h2>
            <p class="lead text-muted">Veja quem também está turbinando a produtividade com nosso Gerenciador.</p>
        </div>

        <div class="row g-3">
            
            <div class="col-sm-6">
                <div class="card h-100 shadow-sm border-0 user-card bg-white">
                    <div class="card-body d-flex align-items-center gap-3">
                        <img src="https://i.pravatar.cc/150?img=32" class="rounded-circle border border-3 border-danger" width="60" height="60">
                        <div>
                            <h6 class="fw-bold mb-1">Fernanda Lima</h6>
                            <span class="badge bg-danger bg-opacity-10 text-danger">Designer</span>
                            <p class="small text-muted mb-0 mt-1">"Minhas entregas nunca mais atrasaram!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 shadow-sm border-0 user-card bg-white">
                    <div class="card-body d-flex align-items-center gap-3">
                        <img src="https://i.pravatar.cc/150?img=11" class="rounded-circle border border-3 border-success" width="60" height="60">
                        <div>
                            <h6 class="fw-bold mb-1">Roberto Dias</h6>
                            <span class="badge bg-success bg-opacity-10 text-success">Desenvolvedor</span>
                            <p class="small text-muted mb-0 mt-1">"A prioridade por cores salvou meu dia."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 shadow-sm border-0 user-card bg-white">
                    <div class="card-body d-flex align-items-center gap-3">
                        <img src="https://i.pravatar.cc/150?img=5" class="rounded-circle border border-3 border-warning" width="60" height="60">
                        <div>
                            <h6 class="fw-bold mb-1">Juliana Paes</h6>
                            <span class="badge bg-warning bg-opacity-10 text-dark">Estudante</span>
                            <p class="small text-muted mb-0 mt-1">"Uso para organizar as provas da faculdade."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 shadow-sm border-0 user-card bg-white">
                    <div class="card-body d-flex align-items-center gap-3">
                        <img src="https://i.pravatar.cc/150?img=68" class="rounded-circle border border-3 border-info" width="60" height="60">
                        <div>
                            <h6 class="fw-bold mb-1">Carlos Silva</h6>
                            <span class="badge bg-info bg-opacity-10 text-primary">Gerente</span>
                            <p class="small text-muted mb-0 mt-1">"Simples, rápido e muito eficiente."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 shadow-sm border-0 user-card bg-white">
                    <div class="card-body d-flex align-items-center gap-3">
                        <img src="https://i.pravatar.cc/150?img=44" class="rounded-circle border border-3 border-primary" width="60" height="60">
                        <div>
                            <h6 class="fw-bold mb-1">Ana Souza</h6>
                            <span class="badge bg-primary bg-opacity-10 text-primary">Professora</span>
                            <p class="small text-muted mb-0 mt-1">"Meus planos de aula agora estão em dia."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 shadow-sm border-0 user-card bg-white">
                    <div class="card-body d-flex align-items-center gap-3">
                        <img src="https://i.pravatar.cc/150?img=12" class="rounded-circle border border-3 border-dark" width="60" height="60">
                        <div>
                            <h6 class="fw-bold mb-1">Paulo Mendes</h6>
                            <span class="badge bg-dark bg-opacity-10 text-dark">Arquiteto</span>
                            <p class="small text-muted mb-0 mt-1">"Gerencio obras e prazos com facilidade."</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<hr class="my-5 opacity-10">

<div class="row text-center mb-5">
    <div class="col-md-4 mb-4 mb-md-0 feature-box">
        <div class="feature-icon bg-primary bg-opacity-10 text-primary mx-auto mb-3">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h5 class="fw-bold">Segurança Total</h5>
        <p class="text-muted small px-3">Seus dados são criptografados e protegidos com as melhores tecnologias de segurança.</p>
    </div>

    <div class="col-md-4 mb-4 mb-md-0 feature-box">
        <div class="feature-icon bg-success bg-opacity-10 text-success mx-auto mb-3">
            <i class="bi bi-lightning-charge-fill"></i>
        </div>
        <h5 class="fw-bold">Alta Performance</h5>
        <p class="text-muted small px-3">Interface otimizada para carregar instantaneamente em qualquer dispositivo.</p>
    </div>

    <div class="col-md-4 feature-box">
        <div class="feature-icon bg-warning bg-opacity-10 text-warning mx-auto mb-3">
            <i class="bi bi-trophy-fill"></i>
        </div>
        <h5 class="fw-bold">Foco em Resultado</h5>
        <p class="text-muted small px-3">Organize prazos e prioridades para nunca mais perder uma entrega importante.</p>
    </div>
</div>

@endsection
