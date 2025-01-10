@extends('layouts.page')

@section('content')
    <h1>Каталог товаров</h1>

    <div class="table">
        <table class="table table-striped-columns">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" min="1" max="10" value="1">
                            <button type="submit">Добавить в корзину</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            </tbody>
        </table>
    </div>
@endsection
