<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $nome = 'Lucas Rodrigues Simione';
        $arr = ['Lucas', 'Felipe', 'Maiker'];
    
        return view('welcome', 
            ['nome' => $nome, 
            'arr' => $arr
            ]);
    }

    public function create()
    {
        return view('events.create');
    }
}
