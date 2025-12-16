<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Application;

class StudentController extends Controller
{
    public function index()
    {
        $tasks = \App\Models\Task::all();
        return view('student.tasks', compact('tasks'));
    }


    public function apply(Task $task)
    {
        $exists = Application::where('task_id', $task->id)
            ->where('student_id', auth()->id())
            ->exists();

        if ($exists) {
            return back();
        }

        Application::create([
            'task_id' => $task->id,
            'student_id' => auth()->id(),
            'status' => 'pending',
        ]);

        return back();
    }

}
