<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('components.orders.index', ['orders' => $orders]);
    }

    public function create(Request $request)
    {
        $cart = json_decode($request->input('cart'));
        $productIds = [];
        $order = Order::query()->create([
            'total_price' => $request->input('total')
        ]);

        foreach ($cart as $value) {
            $productIds[] = $value->product->id;
        }

        $order->products()->attach($productIds);

        $request->session()->forget('cart');

        return redirect()->back()->with('success', 'Заказ сформирован!');
    }

    public function delete(Order $order)
    {
        $order->delete();

        return redirect()->back()->with('success', 'Заказ удалён!');
    }
}
