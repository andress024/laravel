<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);
        
        // Agregar producto al carrito
        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '¡Producto agregado al carrito!');
    }

    public function index()
{
    // recuperar productos de la sesión
    $cartItems = session()->get('cart', []);

    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item['price'] * $item['quantity']; // Calcula el total
    }

    return view('comprador.cart', compact('cartItems', 'total'));
}


    public function checkout(Request $request)
    {

        Session::forget('cart'); // Limpia el carrito
        return redirect()->route('comprador.index')->with('success', 'Compra realizada con éxito.');
    }
    public function update(Request $request, $productId)
{
    $cart = session()->get('cart', []);


    if (isset($cart[$productId])) {
        
        $cart[$productId]['quantity'] = $request->input('quantity');
        
        // Guardar el carrito actualizado en la sesión
        session()->put('cart', $cart);

        return redirect()->route('comprador.cart.index')->with('success', 'Cantidad actualizada.');
    }

    return redirect()->route('comprador.cart.index')->with('error', 'El producto no se encuentra en el carrito.');
}

public function remove($productId)
{
    // Recuperar el carrito de la sesión
    $cart = session()->get('cart', []);

    // Verificar si el producto está en el carrito
    if (isset($cart[$productId])) {
        // Eliminar el producto del carrito
        unset($cart[$productId]);

        // Guardar el carrito actualizado en la sesión
        session()->put('cart', $cart);

        return redirect()->route('comprador.cart.index')->with('success', 'Producto eliminado del carrito.');
    }

    return redirect()->route('comprador.cart.index')->with('error', 'El producto no se encuentra en el carrito.');
}

}


