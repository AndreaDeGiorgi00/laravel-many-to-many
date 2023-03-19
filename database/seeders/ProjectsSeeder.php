<?php

namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_projects = config('projects');
        foreach($all_projects as $project){
            $new_project = new Project;
            $new_project->name_project = $project['name_project'];
            $new_project->description = $project['description'];
            $new_project->link_git = $project['link_git'];
            $new_project->save();
        }
    }
}
