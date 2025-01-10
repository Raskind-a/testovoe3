@extends('layouts.page')

@section('content')
    <h1>Корзина</h1>

    @foreach($products as $product)
        <div class="card mb-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $product['product']->name }}</h5>
                <h6 class="card-title">{{ 'цена: ' . $product['product']->price }}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ 'Количество: ' . $product['quantity'] }}</h6>
            </div>
        </div>
    @endforeach

    <div class="card mb-2" style="width: 18rem;">
        <div class="card-body">
            {{ 'Сумма: ' . $total }}
        </div>
    </div>

    @if($total !== 0)
        <div>
            <form action="{{ route('order.create', ['cart' => json_encode($products), 'total' => $total]) }}"
                  method="POST">
                @csrf
                @method('POST')

                <button type="submit" class="btn btn-primary mb-2">Оформить заказ</button>

            </form>

            <form action="{{ route('cart.clear') }}">
                <button type="submit" class="btn btn-primary">Очистить корзину</button>
            </form>
        </div>
    @else
        <div class="alert alert-success mt-2" style="width: 18rem;">
            Корзина пуста!
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-2" style="width: 18rem;">
            {{ session('success') }}
        </div>
    @endif

@endsection
