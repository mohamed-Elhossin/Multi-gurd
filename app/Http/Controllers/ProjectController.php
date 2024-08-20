<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::with('user')->get();
        // return $projects;
        return view('app_pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app_pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);


        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        // File Code

        if ($request->hasFile('file')) {
            $file_data  =  $request->file("file");
            $file_name = rand(0, 23232) . $file_data->getClientOriginalName();
            $file_type = $file_data->getClientOriginalExtension();
            $location = public_path('project_files');
            $file_data->move($location, $file_name);
            // -----------------
            $project->file =  $file_name;
            $project->file_type =  $file_type;
        }

        $project->user_id = auth()->user()->id;
        $project->save();
        return redirect()->back()->with("done", 'create Project Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::with('user')->find($id);

        return view('app_pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function  update_status(Request $request, $id)
    {

        $project = Project::find($id);
        $project->status = $request->status;
        $project->save();
        return redirect()->back()->with("done", 'Update Project Status Successfully');
    }
    public function  download_file($id)
    {

        $project = Project::find($id);
        $project_path  = public_path() . '/project_files/' . $project->file  ;
        // dd($project_path);
        return  response()->download($project_path);
    }
}
