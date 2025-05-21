<x-app-layout>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .fundo-dashboard {
            background-image: url('/images/naregua4.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            overflow: hidden;
        }
    </style>

    <div class="fundo-dashboard">
        <div class="text-center" style="padding-top: 20%;">
            <h5 class="mt-3" style="color: white;">Bem-vindo ao Gerenciamento do Sistema!</h5>

            <div class="mt-4" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 10px; padding: 20px;">
                <h6 class="mb-3">Funcionalidades disponíveis:</h6>
                <div class="row">
                    <!-- Clientes -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Clientes</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('cliente.index') }}" class="text-dark">Visualizar Clientes</a></li>
                                    <li><a href="{{ route('cliente.create') }}" class="text-dark">Adicionar Novo Cliente</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Produtos -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Produtos</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('produto.index') }}" class="text-dark">Visualizar Produtos</a></li>
                                    <li><a href="{{ route('produto.create') }}" class="text-dark">Adicionar Novo Produto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Vendas -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Vendas</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('vendatmp.index') }}" class="text-dark">Visualizar Vendas</a></li>
                                    <li><a href="{{ route('vendatmp.create') }}" class="text-dark">Adicionar Nova Venda</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Funcionários -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Funcionários</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('funcionarios.index') }}" class="text-dark">Visualizar Funcionários</a></li>
                                    <li><a href="{{ route('funcionarios.create') }}" class="text-dark">Adicionar Novo Funcionário</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Agendamentos -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Agendamentos</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('agendamentos.index') }}" class="text-dark">Visualizar Agendamentos</a></li>
                                    <li><a href="{{ route('agendamentos.create') }}" class="text-dark">Adicionar Novo Agendamento</a></li>
                                    <li><a href="{{ route('calendario.index') }}" class="text-dark"> Agenda</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Serviços -->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Serviços</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('servicos.index') }}" class="text-dark">Visualizar Serviços</a></li>
                                    <li><a href="{{ route('servicos.create') }}" class="text-dark">Adicionar Novo Serviço</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
