<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function mostrarContato(){
        return view('contatos');
    }
}

?>