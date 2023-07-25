<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function CreateTask(Request $request)
    {
        $user_id=$request->header('id');

        // Save To Database
        return Task::create([
            'task_name'=>$request->input('task_name'),
            'description'=>$request->input('description'),
            'priority'=>$request->input('priority'),
            'due_date'=>$request->input('due_date'),
            'status'=>$request->input('status'),
            'user_id'=>$user_id
        ]);
    }

    function DeleteTask(Request $request)
    {
        $user_id=$request->header('id');
        $task_id=$request->input('id');
        return Task::where('id',$task_id)->where('user_id',$user_id)->delete();

    }

    function TaskList(Request $request)
    {
        $user_id=$request->header('id');
        return Task::where('user_id',$user_id)->get();
    }

    function UpdateTask(Request $request)
    {
        $user_id=$request->header('id');
        $task_id=$request->input('id');

        return Task::where('id',$task_id)->where('user_id',$user_id)->update([
                'task_name'=>$request->input('task_name'),
                'description'=>$request->input('description'),
                'priority'=>$request->input('priority'),
                'due_date'=>$request->input('due_date'),
                'status'=>$request->input('status'),
                'user_id'=>$user_id
            ]);

    }
}
