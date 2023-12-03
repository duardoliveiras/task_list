@extends('layouts.app')

@section('title', 'Create Task')    

@section('content')
    {{ $errors }}
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description id="description" rows="5"></textarea>
        </div>

        <div>
            <label for="longDescription">Long Description</label>
            <textarea name="longDescription id="longDescription" rows="10"></textarea>
        </div>

        <button type="submit">Create Task</button>
    </form>
@endsection