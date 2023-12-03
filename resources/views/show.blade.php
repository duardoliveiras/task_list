@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <h1> {{$task->title}} </h1>
    <p> <b>Description:</b> {{$task->description}}</p>

    @if($task->longDescription)
        <p> <b>Long Description:</b> {{$task->longDescription}}</p>
    @endif
    <p> <b>Created At:</b> {{$task->createdAt}}</p>

    @if($task->completed)
        <p> <b>Completed At:</b> {{$task->completedAt}}</p>
    @endif


@endsection