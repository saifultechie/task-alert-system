<?php

namespace App\Http\Controllers;

use Auth;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
   
    public function index()
    {
        $teachers=Teacher::all();
        return view('teacher.index',compact('teachers'));
    }

    
    public function create()
    {

        return view('teacher.create');
    }

    public function store(Request $request)
    {

         $user_id = Auth::user()->id;

        $this->validate($request,[
            'name'        =>'required|max:50',
            'designation'  =>'required',
            'email'        =>'required',
            
            ]);


        $data=$request->all();

        $teacher=new Teacher;
        $teacher->name        =$data['name'];
        $teacher->designation  =$data['designation'];
        $teacher->email         =$data['email'];
        $teacher->created_by   =$user_id;
        $teacher->updated_by   =$user_id;

        if($teacher->save())
        {
            return redirect()->route('index_teacher');
        }
        
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $teacher=Teacher::find($id);
        return view('teacher.edit',compact('teacher'));
    }

  
    public function update(Request $request, $id)
    {
         $user_id = Auth::user()->id;

        $this->validate($request,[
            'name'        =>'required|max:50',
            'designation'  =>'required',
            'email'        =>'required',
            
            ]);

        $data=$request->all();
        $teacher=Teacher::find($id);

       
        $teacher->name        =$data['name'];
        $teacher->designation  =$data['designation'];
        $teacher->email         =$data['email'];
        $teacher->created_by   =$user_id;
        $teacher->updated_by   =$user_id;

        if($teacher->save())
        {
            return redirect()->route('index_teacher');
        }

        
    }

    public function destroy($id)
    {
         $teacher = Teacher::find($id);

        if ($teacher->delete())
        {
            
            return redirect()->route('index_teacher');
             
        }
        else
        {
            
            return redirect()->route('index_teacher');
            
        }
    }
}
