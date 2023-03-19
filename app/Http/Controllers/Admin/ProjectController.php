<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Arr;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_projects = Project::all();
        return view('admin.projects.index',compact('all_projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create' , compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        
        $project = new Project;

        if(array_key_exists('image' , $data)){
            $img_url = Storage::put('project_images', $data['image']) ;
            $data['image']= $img_url;
            $project->image = $data['image'];
        }

        $project->type_id = $data['type_id'];
        $project->name_project = $data['titolo'];
        $project->description= $data['descrizione'];
        $project->link_git = $data['link_git_hub'];
        $project->save();

        if(Arr::exists($data , 'tags'))$project->technologies()->attach($data['tags']);

        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $types = Type::all();
        $technologies = Technology::all();
        $project_technologies = $project->technologies->pluck('id')->toArray();
        return view('admin.projects.edit' , compact('project','types','technologies','project_technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {
        $data = $request->all();
        $project = Project::find($id);
        if(array_key_exists('image' , $data)){
            $img_url = Storage::put('project_images', $data['image']) ;
            $data['image']= $img_url;
        }
        
        $project->type_id = $data['type_id'];
        $project->name_project = $data['titolo'];
        $project->description= $data['descrizione'];
        $project->link_git = $data['link_git_hub'];
        $project->save();
        if(Arr::exists($data , 'tags'))$project->technologies()->sync($data['tags']);
        else $project->technologies()->detach();
        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        if($project->technologies)$project->technologies()->detach();
        $project -> delete();
        

        return to_route('admin.projects.index');
    }
}
