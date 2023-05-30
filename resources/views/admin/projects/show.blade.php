@extends ('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>{{$project->title}}</h1>
    <h6><small>Slug: {{$project->slug}}</small></h6>

    <h3>Tipo: {{$project->type?$project->type->name:'Nessun tipo abbinato'}}</h3>

    @foreach ($project->technologies as $technologies)
        <span class="badge rounded-pill text-bg-success">{{$technologies->name}}</span>
    @endforeach

    @if ($project->cover_image)
        <div class="col-4">
            <img class="img-thumbnail" src="{{$project->cover_image}}" alt="{{$project->title}}"/>
        </div>
    @endif

    <p>{{$project->content}}</p>



    <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna alla lista</a>

</div>

@endsection
