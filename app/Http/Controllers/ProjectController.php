<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Muestra la vista con todos los proyectos.
     */
    public function index()
    {
        $proyectos = Project::all();
        return view('proyectos', compact('proyectos'));
    }
}

