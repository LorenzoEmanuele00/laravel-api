@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <form action="{{route('admin.projects.update', ['project' => $project->slug])}}" method="POST"> 
            @csrf
            @method('PUT')
            <div class="mb-3 w-50 mx-auto has-validation">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 w-25 mx-auto">
                <label for="type_id">Seleziona Tipo</label>
                <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                    <option value="" @selected(!old('type_id', $project->type_id))>Nessun Tipo</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" @selected(old('type_id', $project->type_id) == $type->id)>{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            @foreach ($technologies as $technology)
                <div class="form-check w-25 mx-auto">
                    <label class="form-check-label" for="technology_{{$technology->id}}">{{$technology->name}}</label>
                    <input class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technology_{{$technology->id}}" name="technologies[]" @checked($errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology))>
                </div>
            @endforeach
            <div class="mb-3 w-50 mx-auto">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{old('description', $project->description)}}</textarea>
            </div>

            <button class="btn btn-warning mx-auto d-block mt-3" type="submit">Aggiorna</button>
        </form>
    </div>
@endsection