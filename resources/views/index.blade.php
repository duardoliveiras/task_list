<h1>
    Task List
</h1>

@forelse ($tasks as $task )
        @if($task->completed)
            <div style="background-color: #87f5a4 ">
        @else
            <div style="background-color: #ff5c5c">
        @endif
            <a href={{ route('tasks.view', ['id' => $task->id ]) }}> {{ $task->title }}</a>
@empty
    <p><b>No tasks found!</b></p>
@endforelse
