<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{

    protected $tasks;

    public function __construct(TaskRepository $tasksRep){
        $this->middleware('auth');
        $this->tasks = $tasksRep;
    }


    public function index(Request $request){
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:10|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

}
