<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        //dd($projects);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:10|max:300|unique:projects,name',
            'client_name' => 'nullable|min:10',
            'summary' => 'nullable|min:15'
        ]);


        $formData = $request->all();
        //dd($formData);

        $newProject = new Project();
        //$newProject->name = $formData('name');
        //$newProject->slug = Str::slug($formData['name'], '-');
        $newProject->slug = Str::slug($newProject->name, '-');
        $newProject->fill($formData);
        //dd($newProject);
        $newProject->save();

        return redirect()->route('admin.projects.show', ['project' => $newProject->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //dd($project);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //dd($project);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            //'name' => 'required|min:10|max:300|unique:projects,name',
            'name' => [
                'required',
                'min:10',
                'max:300',
                Rule::unique('projects')->ignore($project)
            ],
            'client_name' => 'nullable|min:10',
            'summary' => 'nullable|min:15'
        ]);

        $formData = $request->all();
        $formData['slug'] = Str::slug($formData['name'], '-');
        $project->update($formData);
        //dd($project);
        //dd($formData);
        
        return redirect ()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        //dd('distrutto tutto');
        //dd($project);

        return redirect()->route('admin.projects.index');
    }
}
