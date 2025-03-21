<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Project;

class TodoController extends Controller
{
    // Tampilkan semua project
    public function index()
{
    // Ambil id juga biar nggak error pas route
    $todos = Todo::get(['id', 'category', 'name', 'status']);
    // Hitung total poin category
    $doneCount = Todo::where('status', 'Done')->sum('category');

    return view('todo-index', compact('todos', 'doneCount'));
}
    // Tampilkan form setting
    public function setting($id) {
        $project = Project::findOrFail($id);
        $todos = Todo::where('project_id', $id)->get();

        return view('project-setting', [
            'todos' => $todos,
            'project_name' => $project->name,
            'project_status' => $project->status, // ✅ Ini yang wajib ditambah
        ]);
    }

    // Simpan data todo baru dan hubungkan ke project
    public function store(Request $request) {
        // Validasi form input (hapus 'status' karena ngikut project)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'project_name' => 'required|string' // Pakai nama project untuk referensi
        ]);


        // Cek apakah todo dengan nama sama sudah ada
        $exists = Todo::where('name', $validated['name'])->exists();
        if ($exists) {
            return back()->withErrors(['name' => 'Nama todo sudah digunakan.'])->withInput();
        }

        // Cari project berdasarkan nama
        $project = Project::where('name', $validated['project_name'])->first();
        if (!$project) {
            return back()->withErrors(['project_name' => 'Project tidak ditemukan'])->withInput();
        }

        // Simpan ke Todo dengan status ngikut Project
        Todo::create([
            'name' => $validated['name'],
            'status' => $project->status, // ngikut status project
            'category' => $validated['category'],
            'user_id' => $project->user_id,
            'project_id' => $project->id,
        ]);

        return redirect()->route('todos')->with('success', 'Todo berhasil ditambahkan!');
    }

        public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos')->with('success', 'Todo berhasil dihapus!');
    }

    public function review($id)
    {
        $todo = Todo::with('project')->findOrFail($id); // <- pakai 'with'
        return view('todo-review', compact('todo'));
    }

        // Fungsi untuk update hanya status
        public function updateStatus(Request $request, $id)
        {
            $validated = $request->validate([
                'status' => 'required|in:In-Progres,Done,Progres'
            ]);

            $todo = Todo::findOrFail($id);
            $todo->status = $validated['status'];
            $todo->save();

            return redirect()->route('todos')->with('success', 'Status berhasil diupdate!');
        }



}
