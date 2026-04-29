<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        .brand-icon {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        /* Suaviza a transição de cores ao trocar o tema */
        body {
            transition: background-color 0.3s, color 0.3s;
        }
    </style>
</head>
<body class="bg-body-tertiary">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                <div class="brand-icon bg-primary text-white">
                    <i class="bi bi-check2-square fs-5"></i>
                </div>
                <span class="fw-bold text-uppercase" style="letter-spacing: 1px;">TaskMaster</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-3">
                    @auth
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('trabalho.index') }}">Pendentes</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="{{ route('trabalho.concluidos') }}">Concluídos</a></li>
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    
                    <li class="nav-item">
                        <button class="btn btn-outline-secondary btn-sm rounded-circle text-white" id="btnTheme" title="Alternar Tema">
                            <i class="bi bi-moon-stars-fill"></i>
                        </button>
                    </li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d6efd&color=fff" class="rounded-circle" width="30" height="30">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">Entrar</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-light btn-sm ms-2">Cadastrar</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow border-0 mb-5">
            <div class="card-body p-4">
                @yield('conteudo')
            </div>
        </div>
        
        <footer class="py-4 text-center text-muted small">
            <p class="mb-0">&copy; {{ date('Y') }} <strong>TaskMaster</strong> - Versão Dark Mode 🌙</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const btnTheme = document.getElementById('btnTheme');
        const html = document.documentElement;
        const icon = btnTheme.querySelector('i');

        // 1. Ao carregar, verifica se o usuário já escolheu um tema antes
        const currentTheme = localStorage.getItem('theme') || 'light';
        applyTheme(currentTheme);

        // 2. Função que aplica as cores e troca o ícone
        function applyTheme(theme) {
            html.setAttribute('data-bs-theme', theme);
            if(theme === 'dark') {
                icon.classList.remove('bi-moon-stars-fill');
                icon.classList.add('bi-sun-fill'); // Vira Sol
            } else {
                icon.classList.remove('bi-sun-fill');
                icon.classList.add('bi-moon-stars-fill'); // Vira Lua
            }
        }

        // 3. Ao clicar no botão, inverte o tema e salva na memória
        btnTheme.addEventListener('click', () => {
            const newTheme = html.getAttribute('data-bs-theme') === 'light' ? 'dark' : 'light';
            localStorage.setItem('theme', newTheme);
            applyTheme(newTheme);
        });
    </script>
</body>
</html>
