@extends('layouts.admin')

@section('content')
    <h1>Edit del post: {{ $project->name }}</h1>

    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
        </div>

        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $project->client_name }}">
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" name="summary" rows="15">{{ $project->summary }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection