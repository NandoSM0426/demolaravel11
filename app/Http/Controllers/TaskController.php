<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index(Request $request) {
        $search = $request->input('search');

        if($search){
            $tasks = Task::where('name', 'like', "%$search%")->get();
        }else{
            $tasks = Task::all();
        }


        return view('tasks.index', [
            'tasks' => $tasks,
            'search' => $search
        ]);
    }

    function show(Task $task) {

        return view('tasks.show', [
            'task' => $task
        ]);
    }

    function create() {

        return view('tasks.create');
    }

    function store(Request $request) {

        $data = $request->validate([
                    'name' => 'required'
                ]);

       Task::create($data);

        return redirect()->route('tasks.index');
  
    }

    function edit(Task $task) {

        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    function update(Task $task, Request $request) {

        $data = $request->validate([
            'name' => 'required'
        ]);

        $task->update($data);

        return redirect()->route('tasks.index');

    }

    function destroy(Task $task) {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
