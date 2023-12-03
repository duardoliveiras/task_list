<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\DescriptionList\Node\Description;

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


Route::get('/tasks', function (){
    return view ('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::post('/tasks', function (Request $request){
   dd($request->all());

})->name('tasks.store');

Route::get('/tasks/create', function(){
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => Task::findOrFail($id)
]);
})->name('tasks.show');

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::fallback(function () {
    return 'Dont find';
});
