<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $subject)
    {
    return view('student/Tasks',["subject" =>$subject]);
    }
    public function index_tasks(Subject $subject)
    {
        return view('teacher/checktasks',[ "subject" =>$subject]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        return view('teacher/newtask',[ "subject"=>$subject]);
    }
    public function showsolution(Task $task)
    {
        return view('student/tasksolution',[ "task"=>$task]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFormRequest $request,Subject $subject)
    {
       $validated_data= $request->validated();
        //store data in database ($validated_data)
        $subject->tasks()->create($validated_data);
        return redirect()->route('subject.tasks.list',['subject'=>$subject]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showstudent(Task $task)
    {
      return view('student/taskview',
       [ "task" =>$task,'subject'=>$task->subject]
      );
    }
    public function showteacher(Task $task)
    {
        return view('teacher/taskviewteacher',
       [ "task" =>$task,'subject'=>$task->subject]
      );
    }
    public function send(Request $request,Task $task)
    {

        $validated_data= $request->validate(
            ['solution'=> 'required']
        );

        $task->update($validated_data);

        return redirect()->route('subject.tasks.list', [ 'subject' => $task->subject]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
      return view('teacher/edittask',
       [ 'task' =>$task ]
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskFormRequest $request, Task $task)
    {
        $validated_data= $request->validated();

        $task->update($validated_data);

        return redirect()->route('subject.tasks.list', [ 'subject' => $task->subject]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if($task != null)
        {
            $task->delete();
        }
        return redirect()->route('subject.tasks.list',[ 'subject' => $task->subject]);
    }
}
