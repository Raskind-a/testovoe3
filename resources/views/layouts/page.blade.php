<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed;
            top: 50px;
            left: 0;
            bottom: 0;
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="list-group">
        <a href="{{ route('index') }}" class="list-group-item list-group-item-action mb-2">Товары</a>
        <a href="{{ route('cart.index') }}" class="list-group-item list-group-item-action mb-2">
            @if(session('cart'))
                {{ "Корзина (" . (session('cart') ? count(session('cart')) : 0) . ")" }}
            @else
                Корзина
            @endif
        </a>
        <a href="{{ route('order.index') }}" class="list-group-item list-group-item-action mb-2">Заказы</a>
    </div>
</div>

<div class="content-wrapper">
    @yield('content')
</div>

</body>
</html>
