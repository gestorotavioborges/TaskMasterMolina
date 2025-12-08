@extends('layout')

@section('conteudo')

<div class="mb-4">
    <h3 class="fw-bold text-dark">Dashboard</h3>
    <p class="text-muted">Visão geral do seu progresso</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-primary border-4">
            <div class="card-body">
                <h6 class="text-uppercase text-muted small fw-bold">Pendentes</h6>
                <h2 class="text-primary mb-0">{{ $totalPendentes }}</h2>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-success border-4">
            <div class="card-body">
                <h6 class="text-uppercase text-muted small fw-bold">Concluídas</h6>
                <h2 class="text-success mb-0">{{ $totalConcluidos }}</h2>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-danger border-4">
            <div class="card-body">
                <h6 class="text-uppercase text-muted small fw-bold">Atrasadas</h6>
                <h2 class="text-danger mb-0">{{ $totalAtrasados }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-bold">Distribuição por Prioridade</div>
            <div class="card-body">
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Alta Prioridade</span>
                        <span class="fw-bold text-danger">{{ $altas }}</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger" style="width: {{ $totalPendentes > 0 ? ($altas / $totalPendentes)*100 : 0 }}%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Média Prioridade</span>
                        <span class="fw-bold text-warning">{{ $medias }}</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: {{ $totalPendentes > 0 ? ($medias / $totalPendentes)*100 : 0 }}%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Baixa Prioridade</span>
                        <span class="fw-bold text-success">{{ $baixas }}</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: {{ $totalPendentes > 0 ? ($baixas / $totalPendentes)*100 : 0 }}%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
                <span>Últimas Adicionadas</span>
                <a href="{{ route('trabalho.index') }}" class="btn btn-sm btn-outline-primary">Ver tudo</a>
            </div>
            <div class="list-group list-group-flush">
                @foreach($recentes as $t)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge bg-{{ $t->category->color ?? 'secondary' }} me-2">
                                {{ $t->category->name ?? 'Geral' }}
                            </span>
                            {{ Str::limit($t->name, 30) }}
                        </div>
                        <a href="{{ route('trabalho.edit', $t->id) }}" class="btn btn-sm btn-light text-muted">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                @endforeach
                @if($recentes->count() == 0)
                    <div class="p-3 text-center text-muted">Nenhuma tarefa recente.</div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
