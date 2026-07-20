<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $tasks = auth()->user()->tasks()->latest()->get();
    return view('tasks.index', compact('tasks'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    auth()->user()->tasks()->create($validated);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $task = auth()->user()->tasks()->findOrFail($id);
    return view('tasks.edit', compact('task'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $task = auth()->user()->tasks()->findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_completed' => 'boolean',
    ]);

    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $task = auth()->user()->tasks()->findOrFail($id);
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}
}
