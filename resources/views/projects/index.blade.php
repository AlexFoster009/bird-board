@extends('layouts.app')

@section('content')
    <h1>Birdboard</h1>
    <ul>
        @foreach($projects as $project)
            <li>{{$project->title}}</li>
        @endforeach
    </ul>
@endsection
