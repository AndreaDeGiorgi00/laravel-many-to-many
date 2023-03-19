@extends('layouts.app')
@vite(['resources/js/app.js'])
@section('content')
    <div class="container mt-5 d-flex justify-content-between align-items-center show">
        <div>
            <h2>{{$project->name_project}}</h2>
            
            @if ($project->type)
                
            <span class="box {{$project->type->color}}">{{$project->type->name}}</span>
            @endif
            <p class="my-3">{{$project->description}}</p>
            
            
            <a href="{{route('admin.projects.edit', $project)}}"  class="btn btn-success">modifica</a>
        </div>

        
        @if ($project->image)
            
        <img src="{{ asset('storage/' . $project->image) }}" class="preview"> 
        @endif
    </div>

@endsection