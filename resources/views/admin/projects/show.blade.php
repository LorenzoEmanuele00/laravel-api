@extends('layouts.admin')

@section('content')
    <div class="container m-3">
        <h2 class="my-3">{{$project->title}}</h2>
        <h5>Tipo: {{$project->type ? $project->type->name : 'Nessun Tipo'}}</h5>
        <div class="my-3">
            Technology tag:
            @foreach ($project->technologies as $technology)
                <span class="badge bg-primary">{{ $technology->name }}</span>
            @endforeach
        </div>
        @if ($project->project_image)
            <img class="mw-100" src="{{ asset('storage/' . $project->project_image) }}" alt="immagine dimostrativa">
        @else
            <div class="my-2">Nessuna immagine disponibile</div>
        @endif
        <p>{{$project->slug}}</p>
        <p>{{$project->description}}</p>
    </div>
@endsection