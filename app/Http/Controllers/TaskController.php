<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Task;

class TaskController extends Controller
{
    //Show all tasks
    public function showAll() {
        $tasks = Task::orderBy('created_at', "asc")->get();


        return view('tasks', [
            'tasks' => []
        ]);
    }

    //Add a new task
    public function addTask(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $task= new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    //Delete a task by ID
    public function deleteTask($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }
}
