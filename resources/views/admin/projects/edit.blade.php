@extends('layouts.app')
@vite(['resources/js/app.js'])
@section('content')


    <form action="{{route('admin.projects.update' , $project->id)}}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container mt-5 col-6 ">

            <div class="mb-3 col-6">
            <label for="Titolo" class="form-label"><h4>Titolo progetto</h4></label>
            <input type="text" class="form-control" id="titolo" name="titolo" value="{{$project->name_project}}">
            </div>

            <div class="mb-4">
            <label for="linkGitHub" class="form-label"><h4>Link git hub</h4></label>
            <input type="text" class="form-control" id="linkGitHub" name="link_git_hub" value="{{$project->link_git}}">
            </div>

            <div class="mb-4">
            <label for="descrizione" class="form-label"><h4>Descrizione</h4></label>
            <textarea class="form-control" id="descrizione" rows="3" name="descrizione" >{{$project->description}}</textarea>
            
            <div class="mb-4 mt-4">
            <label for="image" class="form-label" ><h4>File immagine</h4></label>
            <input type="file" class="form-control" id="image" name="image">
            </div>

            <label for="type_id" class="form-label" ><h4>Tipo di progetto</h4></label>
            <select class="form-select" name="type_id" aria-label="Default select example">
                <option value="">nessun type</option>
                @foreach ($types as $type)
                <option @if ($project->type_id === $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                    
                @endforeach
                
            </select>

            <h3 class="mt-5">tipologie</h3>
            
            @foreach ($technologies as $technology)
                
            <div class="form-check form-check-inline ">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$technology->id}}" value="{{$technology->id}}" name="tags[]" @if (in_array($technology->id, $project_technologies)) checked @endif>
            <label class="form-check-label" for="inlineCheckbox{{$technology->id}}">{{$technology->name}}</label>
            </div>
            @endforeach

            <div class="text-center">
            <button type="submit" class="btn btn-success mt-5">Modifica</button>
            </div>
        </div>
    </form>
</div>
@endsection