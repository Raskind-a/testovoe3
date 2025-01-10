@extends('layouts.page')

@section('content')
    <h1>Заказы</h1>

    @foreach($orders as $order)
        <div class="card mb-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ 'id: ' . $order->id }}</h5>
                <h6 class="card-title">{{ 'Дата заказа: ' . $order->created_at }}</h6>

                <div>
                    {{ $order->products->pluck('name')->implode(', ') }}
                </div>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ 'цена заказа: ' . $order->total_price }}</h6>

                <form action="{{ route('order.delete', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-2">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="card mb-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ 'Итоговая цена всех заказов: ' . $orders->sum('total_price') }}</h5>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-2" style="width: 18rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(blank($orders))
        <div class="alert alert-success mt-2" style="width: 18rem;">
            Заказов нет!
        </div>
    @endif
@endsection

