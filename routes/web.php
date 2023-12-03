<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Class Task{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $longDescription,
        public bool $completed,
        public string $createdAt,
        public ?string $completedAt
        // The '?' symbol means that the variable can be null
    ){ 

    }
}

$tasks = [
    new Task(
        id: 1,
        title: 'Buy Milk',
        description: 'Buy Milk',
        longDescription: 'Lacbom Milk',
        completed: false,
        createdAt: '2023-12-01',
        completedAt: null
    ),
    new Task(
        id: 2,
        title: 'University test',
        description: 'Study for the test',
        longDescription: 'Calculus',
        completed: true,
        createdAt: '2021-01-01',
        completedAt: '2021-01-01'
    ),
    new Task(
        id: 3,
        title: 'Clean Home',
        description: 'Clean the room and the bathroom',
        longDescription: 'At 10:00',
        completed: false,
        createdAt: '2023-12-03',
        completedAt: null
    ),
    new Task(
        id: 4,
        title: 'End the course',
        description: 'Laravel Course',
        longDescription: 'Blade, Eloquent, Migrations, etc',
        completed: true,
        createdAt: '2023-11-01',
        completedAt: '2023-12-01'
    )
];

Route::get('/tasks', function () use ($tasks){
    return view ('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use($tasks) {

    // To find the first element in the array that satisfies the condition (id of the task)
    $task = collect($tasks)->firstWhere('id', $id);

    // If the task does not exist, return a 404 error
    if(!$task){
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', [
        'task' => $task
    ]);
    
})->name('tasks.show');

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::fallback(function () {
    return 'Dont find';
});
