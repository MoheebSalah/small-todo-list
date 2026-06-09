<?php

namespace App\Http\Controllers;

use App\Models\rc;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pending = Task::where('status', 'pending')->get();
        $inProgress = Task::where('status', 'in_progress')->get();
        $done = Task::where('status', 'done')->get();
        return view('tasks.index', [
            'pending' => $pending,
            'inProgress' => $inProgress,
            'done' => $done
        ]);
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
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
        ], [
            'title.required' => 'Please give this task a title',
            'status.required' => 'Task must have a status',

        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if($task->user_id !== auth()->id())
            abort(403);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if($task->user_id !== auth()->id())
            abort(403);
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
        ], [
            'title.required' => 'Please give this task a title',
            'status.required' => 'Task must have a status',

        ]);

        $task->update($validated);
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if($task->user_id !== auth()->id())
            abort(403);
        $task->delete();

        return redirect('/tasks');
    }
}
