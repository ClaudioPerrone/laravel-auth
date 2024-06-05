@extends('layouts.admin');

@section('content')
    <h1>Projects</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Client name</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>                    
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>
                        <div>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">Info</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection;