<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks=Task::all();
        return view('task.index',compact('tasks'));
    }

    
    public function create()
    {
        $teachers=Teacher::all();
        return view('task.create',compact('teachers'));
    }

   
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request,[
            'title'        =>'required|max:50',
            'description'  =>'required',
            'date'         =>'required',
            'start_time'   =>'required',
            'end_time'     =>'required',
            'notify_before'=>'required',
            'teacher_id'   =>'required',

            ]);


        $data=$request->all();

        $start = $data['date'].' '.$data['start_time'];
        $end   = $data['date'].' '.$data['end_time'];

        $task=new Task;
        $task->title        =$data['title'];
        $task->description  =$data['description'];
        $task->start_time   =$start;
        $task->end_time     =$end;
        $task->notify_before=$data['notify_before'];
        $task->teacher_id=$data['teacher_id'];
        $task->created_by   =$user_id;
        $task->updated_by   =$user_id;

        if($task->save())
        {
            return redirect()->route('index_task');
        }



    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $teachers=Teacher::all();
        $task=Task::find($id);
        //return $task; 
        return view('task.edit',compact('task','teachers'));
    }

   
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request,[
            'title'        =>'required|max:50',
            'description'  =>'required',
            'date'         =>'required',
            'start_time'   =>'required',
            'end_time'     =>'required',
            'notify_before'=>'required',
            'teacher_id'   =>'required',

            ]);


        $data=$request->all();

        $start = $data['date'].' '.$data['start_time'];
        $end   = $data['date'].' '.$data['end_time'];

        $task=Task::find($id);
        $task->title        =$data['title'];
        $task->description  =$data['description'];
        $task->start_time   =$start;
        $task->end_time     =$end;
        $task->notify_before=$data['notify_before'];
        $task->teacher_id=$data['teacher_id'];
        $task->created_by   =$user_id;
        $task->updated_by   =$user_id;

        if($task->save())
        {
            return redirect()->route('index_task');
        }

    }

   
    public function destroy($id)
    {
         $task = Task::find($id);

        if ($task->delete())
        {
            
            return redirect()->route('index_task');
             
        }
        else
        {
            
            return redirect()->route('index_task');
            
        }
    }
}
