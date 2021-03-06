@extends('layouts.app')

@section('content')
    <h1>Birdboard</h1>
    <ul>
        @forelse($projects as $project)
            <li>
                <a href="{{$project->path()}}"> {{$project->title}}</a>
            </li>

        @empty
            <li>No projects yet.</li>
        @endforelse
    </ul>
@endsection
