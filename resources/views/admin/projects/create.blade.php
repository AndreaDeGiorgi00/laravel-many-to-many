@extends('layouts.app')
@vite(['resources/js/app.js'])
@section('content')
    <form action="{{route('admin.projects.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 col-6 ">
            
            <div class="mb-3 col-6">
            <label for="Titolo" class="form-label"><h4>Titolo progetto</h4></label>
            <input type="text" class="form-control" id="titolo" name="titolo">
            </div>

            <div class="mb-4">
            <label for="linkGitHub" class="form-label"><h4>Link git hub</h4></label>
            <input type="text" class="form-control" id="linkGitHub" name="link_git_hub">
            </div>

            <div class="mb-4">
            <label for="descrizione" class="form-label"><h4>Descrizione</h4></label>
            <textarea class="form-control" id="descrizione" rows="3" name="descrizione"></textarea>

            <div class="mb-4 mt-4">
            <label for="image" class="form-label" ><h4>File immagine</h4></label>
            <input type="file" class="form-control" id="image" name="image">
            </div>
            

            <label for="type_id" class="form-label" ><h4>Tipo di progetto</h4></label>
            <select class="form-select" name="type_id" aria-label="Default select example">
                <option value="">nessun type</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                    
                @endforeach
                
            </select>

            <h3 class="mt-5">tipologie</h3>
            @foreach ($technologies as $technology)
                
            <div class="form-check form-check-inline ">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$technology->id}}" value="{{$technology->id}}" name="tags[]">
            <label class="form-check-label" for="inlineCheckbox{{$technology->id}}">{{$technology->name}}</label>
            </div>
            @endforeach
            
            
            <div class="text-center">
            <button type="submit" class="btn btn-success mt-5">salva</button>
            </div>
        </div>
    </form>
</div>
@endsection