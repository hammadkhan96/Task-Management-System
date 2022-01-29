<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        If(Auth::user()->role){
            $task=Task::join('users as u','tasks.employee_id', '=','u.id')->select('tasks.*','u.name')->get()->toArray();
        }else{
            $task=Task::join('users as u','tasks.employee_id', '=','u.id')->where('tasks.employee_id',Auth::id())->select('tasks.*','u.name')->get()->toArray();
        }    
        return view('dashboard')->with('task',$task);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::where('role',0)->get()->toArray();
        return view('create_task')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create([
            'title'=>$request->title,
            'employee_id'=>$request->employee_id,
            'employer_id'=>Auth::id()
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param sdss int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Task::where('id',$id)->first();
        return view('edit_task')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Task::where('id',$id)->update([
            'feedback'=>$request->feedback,
            'completed'=>$request->completed
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('delete');
    }
}
