<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = collect();
        $total = 0;
        foreach (session('cart', []) as $key => $value) {
            $product = Product::find($key);
            $cart->add([
                'product' => $product,
                'quantity' => $value
            ]);
            $total += ($product->price * $value);
        }

        return view('components.cart', collect([
            'products' => $cart,
            'total' => $total
        ]));
    }

    public function add(Request $request)
    {
        $quantity = $request->input('quantity');
        $id = $request->input('id');

        $cart = session('cart', []);

        if (!array_key_exists($id, $cart)) {
            $cart[$id] = (int)$quantity;
        } else {
            $cart[$id] += $quantity;
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

    public function delete(Request $request, Product $product)
    {
        dump($request);
        dd($product);
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');

        return redirect()->back()->with('success', 'Корзина очищена');
    }
}
