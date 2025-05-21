<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/naregua2.jpg'); /* Caminho da imagem */
            background-size: cover; /* Para cobrir toda a área */
            background-position: center; /* Para centralizar a imagem */
            height: 100vh; /* Para garantir que o fundo ocupe toda a altura da tela */
        }
        .btn-custom {
            background-color: #6c757d; /* Cor de fundo cinza */
            color: white; /* Cor do texto */
            border: none; /* Remove borda */
            border-radius: 0.5rem; /* Bordas arredondadas */
            transition: background-color 0.3s; /* Transição suave */
        }
        .btn-custom:hover {
            background-color: #5a6268; /* Tom mais escuro ao passar o mouse */
        }
        .buttons-container {
            margin-top: 400px; /* Ajuste a margem superior conforme necessário */
            text-align: center; /* Centraliza o texto dos botões */
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 buttons-container"> 
        @auth
            <!-- Se o usuário estiver autenticado, não exibe nada -->
        @else
            <!-- Se o usuário não estiver autenticado, exibe os botões de acesso -->
            <a href="/login" class="btn btn-custom mb-2"> 
                Acessar o sistema
            </a>
            {{--<a href="/register" class="btn btn-custom mb-2">
                Crie sua conta
            </a> --}}
        @endauth
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
