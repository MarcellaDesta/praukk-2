<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::all();
        return view('user-dashboard', [
            'pageTitle' => 'tess',
            'project' => $project
        ]);
    }

    public function create() {
        return view('user-create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'category' => 'required|string',
        ], [
            'name.required' => 'Nama project tidak boleh kosong!',
            'status.required' => 'Status tidak boleh kosong!',
            'category.required' => 'Kategori tidak boleh kosong!',
        ]);

        Project::create([
            'name' => $validated['name'],
            'status' => $validated['status'],
            'category' => $validated['category'],
            'user_id' => auth()->id()
        ]);

        return redirect()->route('user-dashboard')->with('success', 'Project berhasil dibuat!');
    }

    public function destroy($id)
        {
            $project = Project::find($id);
            $project -> delete();
            return redirect()->route('user-dashboard')->with('success', 'Data Berhasil Dihapus!');
        }




}
