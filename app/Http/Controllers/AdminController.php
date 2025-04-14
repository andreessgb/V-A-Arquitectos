<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get(); // ya de paso puedes dejarle los roles
        $projects = Project::with('client')->get(); // ya que en la vista quieres mostrar el nombre del usuario

        return view('administracion', compact('users', 'projects'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'square_meters' => 'nullable|integer',
            'type' => 'required|string',
            'status' => 'required|string',
            'budget' => 'nullable|numeric',
            'main_image' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Project::create($validated);

        return redirect()->back()->with('success', 'Proyecto creado con éxito');
    }
        public function edit(Project $project)
    {
        $users = User::all();
        return view('editar-proyecto', compact('project', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'square_meters' => 'nullable|integer',
            'type' => 'required|string',
            'status' => 'required|string',
            'budget' => 'nullable|numeric',
            'main_image' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $project->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Proyecto actualizado con éxito');
    }

}

