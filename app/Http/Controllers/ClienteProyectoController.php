<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteProyectoController extends Controller
{
    public function index()
    {
        $proyectos = auth()->user()->projects; // solo los proyectos del cliente
        return view('/mis-proyectos', compact('proyectos'));
    }
}


