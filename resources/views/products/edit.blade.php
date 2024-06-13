@extends('layouts.app')

@section('content')
    <div class="container-fluid min-vh-100" style="background-color: #adb5bd;">
        <h2>{{ isset($product) ? 'Editar Produto' : 'Criar Novo Produto' }}</h2>
        <form action="{{ isset($product) ? route('produtos.update', $product->id) : route('produtos.store') }}" method="POST">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($product) ? $product->name : '') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', isset($product) ? $product->description : '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="type">Tipo:</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ old('type', isset($product) ? $product->type : '') }}" required>
            </div>
            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
            </div>
            <div class="form-group">
                <label for="stock_quantity">Quantidade em Estoque:</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', isset($product) ? $product->stock_quantity : '') }}" required>
            </div>
            <div class="form-group">
                <label for="brand">Marca:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', isset($product) ? $product->brand : '') }}" required>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
