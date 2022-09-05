<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class TaskController extends Controller
{

    public function index()
    {

        //$tasks = Task::all();

       //$tasks = DB::table('tasks')->get()->toArray();
       $tasks = DB::table('tasks')->select('id', 'created_at', 'updated_at', 'task')->orderBy('created_at', 'desc')->get();
      // dd($tasks);
        return view('tasks.index', compact('tasks'));
    }


    public function store(TaskPostRequest $request)
    {

        $newTask = new Task;
        $todo = $request->task;
        $created = $newTask->create($todo);
        if ($created) {
            return redirect()->back()->with('success', "You have created a task to $todo");
        }
        return  redirect()->back()->with('error', 'Unable to create task '. $todo);

        //return $newTask->create($todo) ? redirect()->back() : redirect()->back()->with('error_msg', 'Unable to create task.');
    }

 
    function delete(Request $request, $taskId){
       
    //     $find = Task::find($taskId);
    //    $deleted = $find->delete();


    // $deleted = DB::table('tasks')->where('id', $taskId)->delete();
    $deleted = DB::table('tasks')->delete($taskId);

        if ($deleted) {
            return redirect()->back()->with('success', "You have deleted a task.");
        }
        return  redirect()->back()->with('error', 'Unable to delete task.');
    }
}
