@extends('layouts.app')

@section('content')

<div class="container d-flex mt-4">
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><h6>Crea Progetto</h6></a>
</div>

<div class="container">

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Tipo</th>
        <th scope="col">Tecnologie</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->type?->name}}</td>
                <td>
                    @foreach ($project->technologies as $technology)
                    <span class="badge rounded-pill text-bg-success">{{$technology->name}}</span>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.projects.show', $project->slug)}}">VEDI</a>
                    <a class="btn btn-warning" href="{{route('admin.projects.edit', $project->slug)}}">MODIFICA</a>

                    <form class="form_delete_project" action="{{route('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>


                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

</div>

@endsection
