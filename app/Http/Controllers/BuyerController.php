<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        // Obtén todos los productos publicados por los vendedores
        $products = Product::all(); 
        return view('comprador.index', compact('products'));
    }
}
