<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;


class AdminController extends Controller
{
    public function adminDashboard()
    {
        $tasks = Task::all();
        return view('admin_dashboard', compact('tasks'));
    }
    public function admin_logout()
    {
        session()->remove('admin');
        // session()->flash('success', "Logged out successfully");
        return redirect()->route('signin');
    }
    public function admin_add_task()
    {
        return view('admin_add_task');
    }
    public function admin_add_task_action(Request $request)
    {
        $validatedData = $request->validate([
            'task_name' => 'required',
            'task_description' => 'required',
            'task_status' => 'required',
            'task_priority' => 'required',
            'task_due_date' => 'required',
        ], [
            'task_name.required' => 'Task name is required',
            'task_description.required' => 'Task description is required',
            'task_status.required' => 'Task status is required',
            'task_priority.required' => 'Task priority is required',
            'task_due_date.required' => 'Task due date is required',
        ]);
        if (!$validatedData) {
            return redirect()->route('admin_add_task')->withErrors($validatedData)->withInput();
        } else {
            $task = new Task();
            $task->task_name = $request->task_name;
            $task->task_description = $request->task_description;
            $task->task_status = $request->task_status;
            $task->task_priority = $request->task_priority;
            $task->task_due_date = $request->task_due_date;
            $task->save();
        }

}
