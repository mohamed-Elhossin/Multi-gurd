<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {

        $task = Task::with(['project', 'creator' ,'asign_to'])->get();
        // return $task;
        return view('app_pages.tasks.index',compact('task'));

    }

    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        return view('app_pages.tasks.create', compact('users', 'projects'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);


        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        // File Code

        if ($request->hasFile('file')) {
            $file_data  =  $request->file("file");
            $file_name = rand(0, 23232) . $file_data->getClientOriginalName();
            $file_type = $file_data->getClientOriginalExtension();
            $location = public_path('project_files');
            $file_data->move($location, $file_name);
            // -----------------
            $task->file =  $file_name;
            $task->file_type =  $file_type;
        }

        $task->create_by  = auth()->user()->id;
        $task->user_id = $request->asignTo;
        $task->project_id = $request->project;
        $task->save();
        return redirect()->back()->with("done", 'create Task Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
