<x-app-layout>

    <h5>Excluir Cliente</h5>

    <form action="/cliente/{{$cliente->id}}" method="POST">
        @csrf
        @method('DELETE')
        
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" value="{{$cliente->nome}}" disabled/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" name="cpf" class="form-control" value="{{$cliente->cpf}}" disabled/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control" value="{{$cliente->telefone}}" disabled/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email" class="form-label">E-mail:</label>
                <input type="text" name="email" class="form-control" value="{{$cliente->email}}" disabled/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-danger">
                    Excluir
                </button>
            </div>
        </div>
    </form>
    

</x-app-layout>
