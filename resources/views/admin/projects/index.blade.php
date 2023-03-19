@extends('layouts.app')
@vite(['resources/js/app.js'])
@section('content')




<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome progetto</th>
      <th scope="col" >Tipologia</th>
      <th scope="col">link git hub</th>
      <th scope="col" >Maggiori dettagli</th>
      <th scope="col" class="d-flex justify-content-center">Modifica</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($all_projects as $project)
      
    <tr>
      <td>{{$project->name_project}}</td>
      <td><span class="box {{$project->type?->color}}">{{$project->type?->name}}</span></td>
      <td><a href="{{$project->link_git}}">vai a git hub</a></td>
      <td><a href="{{route('admin.projects.show', $project['id'])}}" class="btn btn-primary">maggiori info</a></td>
      <td>
      <form method="POST" action="{{route('admin.projects.destroy', $project['id'])}}">
        @csrf
        @method('DELETE')
        <div class="d-flex justify-content-center">
          <button class="btn btn-danger me-3"> elimina</button>
          <a href="{{route('admin.projects.edit', $project)}}"  class="btn btn-success">modifica</a>
        </div>
      </form>
      
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  <div class="container text-center mt-5">
    <a href="{{route('admin.projects.create')}}" class="btn btn-success" > crea nuovo elemento</a>
  </div>

</div>
@endsection

