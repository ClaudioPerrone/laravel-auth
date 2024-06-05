@extends('layouts.admin')

@section('content')
    <h1>{{ $project->name }}</h1>

    <div>
        <h3><strong>ID: </strong> {{ $project->id }}</h3>
    </div>
    
    <div>
        <h3><strong>Slug: </strong> {{ $project->slug }}</h3>
    </div>

    @if ($project->client_name)
        <div>
            <h3><strong>Client name: </strong> {{ $project->client_name ? $project->client_name : 'client name not found'}}</h3>
        </div>        
    @endif
{{--     <div>
        <h3><strong>Client name: </strong> {{ $project->client_name }}</h3>
    </div> --}}

    <div>
        <h3><strong>Summary:</strong></h3>
        <p>{{ $project->summary }}</p>
    </div>

    <div>
        <h4><strong>Created at:</strong> {{ $project->created_at }}</h4>
        <h4><strong>Updated at:</strong> {{ $project->updated_at }}</h4>
    </div>
@endsection