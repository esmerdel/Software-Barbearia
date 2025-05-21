<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/naregua1.jpg'); /* Caminho da imagem */
            background-size: cover; /* Para cobrir toda a área */
            background-position: center; /* Para centralizar a imagem */
            height: 100vh; /* Para garantir que o fundo ocupe toda a altura da tela */
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo semitransparente para o card */
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Sombra suave */
        }
        .btn-primary {
            background-color: #343a40; /* Cor de fundo preta para o botão */
            border: none; /* Remove borda */
        }
        .btn-primary:hover {
            background-color: #495057; /* Tom mais claro ao passar o mouse */
        }
        .alert-danger {
            background-color: #f8d7da; /* Fundo leve para mensagens de erro */
            color: #721c24; /* Texto escuro para erro */
        }
        .text-center {
            color: #ffffff; /* Cor do texto branco */
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Login</h5>
                <form method="post" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
