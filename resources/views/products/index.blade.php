@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100"
        style="background-color: #adb5bd; width: 100vw;">

        <div class="fixed-top-bar fixed-top"
            style="width: 100%; background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Lista de Produtos</h2>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo Produto</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            @if ($products->isEmpty())
                <div class="alert alert-info" role="alert">
                    Nenhum produto encontrado.
                </div>
            @else
                <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
                    <table class="table table-bordered table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade em Estoque</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Criado em</th>
                                <th scope="col">Atualizado em</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->type }}</td>
                                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td>{{ $product->stock_quantity }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ optional($product->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ optional($product->updated_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('produtos.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm btn-edit">Editar</a>
                                        
                                            <form id="form-delete-{{ $product->id }}"
                                                action="{{ route('produtos.destroy', $product->id) }}" method="POST"
                                                class="d-inline m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn"
                                                    data-id="{{ $product->id }}">Excluir</button>
                                            </form>
                                        </div>
                                        

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>


@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Configurar o SweetAlert para o botão de Excluir
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Esta ação não pode ser revertida!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Se confirmado, submeter o formulário de exclusão
                        document.getElementById(`form-delete-${productId}`).submit();
                    }
                });
            });
        });

        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Você deseja editar?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, editar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirecionar para a página de edição
                        window.location.href = this.getAttribute('href');
                    }
                });
            });
        });
    });
</script>
