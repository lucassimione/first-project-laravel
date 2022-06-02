<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function exibirProdutos()
    {
        $busca = request('search');
        return view('products', ['busca' => $busca]);
    }

    public function exibirProduto($id)
    {
        return view('product', 
            ['id' => $id
            ]);
    }
}
