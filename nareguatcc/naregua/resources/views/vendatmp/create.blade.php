<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Cadastrar Nova Venda</h2>

        <form action="/vendatmp" method="POST">
            @csrf

            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" class="form-select" required>
                    @foreach ($clientes as $cli)
                        <option value="{{ $cli->id }}">{{ $cli->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="funcionarios_id" class="form-label">Funcionário</label>
                <select name="funcionarios_id" class="form-select" required>
                    @foreach ($funcionarios as $func)
                        <option value="{{ $func->id }}">{{ $func->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div id="produtos-container">
                <div class="row produto-item align-items-end mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Produto</label>
                        <select name="produtos_id[]" class="form-select select-produto" required>
                            @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">
                                    {{ $produto->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Quantidade</label>
                        <input type="number" name="qtde[]" class="form-control" min="1" required />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Valor</label>
                        <input type="number" name="valor[]" class="form-control" step="0.01" readonly required />
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-outline-danger remove-product">Remover</button>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-outline-success" id="add-product">Adicionar Produto</button>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total da Venda</label>
                <input type="number" id="total" class="form-control" name="total" readonly />
            </div>

            <div class="d-flex justify-content-between">
                <x-botao-voltar href="{{ route('vendatmp.index') }}">Voltar para Início</x-botao-voltar>
                <button type="submit" class="btn btn-primary">Salvar Venda</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-product').addEventListener('click', function () {
            var newProductRow = document.querySelector('.produto-item').cloneNode(true);
            newProductRow.querySelectorAll('input').forEach(input => input.value = '');
            document.getElementById('produtos-container').appendChild(newProductRow);
            updateTotal();
        });

        document.getElementById('produtos-container').addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('remove-product')) {
                if (document.querySelectorAll('.produto-item').length > 1) {
                    event.target.closest('.produto-item').remove();
                    updateTotal();
                }
            }
        });

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.produto-item').forEach(produto => {
                const qtde = produto.querySelector('input[name="qtde[]"]').value;
                const valor = produto.querySelector('input[name="valor[]"]').value;
                if (qtde && valor) {
                    total += parseFloat(qtde) * parseFloat(valor);
                }
            });
            document.getElementById('total').value = total.toFixed(2);
        }

        document.getElementById('produtos-container').addEventListener('input', function (event) {
            if (['qtde[]', 'valor[]'].includes(event.target.name)) {
                updateTotal();
            }
        });

        // ✅ NOVA FUNÇÃO: Preencher valor ao selecionar produto
        document.getElementById('produtos-container').addEventListener('change', function (event) {
            if (event.target && event.target.classList.contains('select-produto')) {
                const selectedOption = event.target.selectedOptions[0];
                const preco = selectedOption.getAttribute('data-valor');
                const valorInput = event.target.closest('.produto-item').querySelector('input[name="valor[]"]');
                if (preco && valorInput) {
                    valorInput.value = parseFloat(preco).toFixed(2);
                    updateTotal();
                }
            }
        });

        document.querySelector('form').addEventListener('submit', function (event) {
            let valid = true;
            document.querySelectorAll('.produto-item').forEach(produto => {
                const qtde = produto.querySelector('input[name="qtde[]"]').value;
                const valor = produto.querySelector('input[name="valor[]"]').value;
                if (!qtde || !valor) {
                    alert("Por favor, preencha a quantidade e o valor de todos os produtos.");
                    valid = false;
                    return false;
                }
            });
            if (!valid) {
                event.preventDefault();
            } else {
                updateTotal();
            }
        });
    </script>

</x-app-layout>
