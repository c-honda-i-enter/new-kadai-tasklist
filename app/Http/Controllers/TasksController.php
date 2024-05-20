<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $task = new Task;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        
        $task->delete('/');
    }
}
