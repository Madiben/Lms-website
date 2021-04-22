<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionFormRequest;
use App\Models\Submission;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        return view('teacher/tasksubmission',
        ["submissions" => $task->submissions]
        );
    }
    public function index_subs(Task $task)
    {
        return view('teacher/tasksubmission',
        ["submissions" => $task->submissions ]
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(SubmissionFormRequest $request,Task $task)
    {
        $validated_data= $request->validated();
        $validated_data['user_id']=Auth::id();
        $task->submissions()->create($validated_data);
            return redirect()->route('submission.answer',['submissions'=>$task->submissions()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
                return view('teacher/tasksubmission',
               ["submissions" => $task->submissions ]
               );
    }
    public function showanswer(Submission $submission)
    {
        $submissions=$submission->all();
                return view('student/checkmyanswer',
               ["submissions" => $submissions ]
               );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        return view('teacher/opensubmission',
         [ "submission" =>$submission]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        $validated_data= $request->validate(['grade'=>'required']);
        $submission->update($validated_data);
        return redirect()->route('task.showt',[ 'task' => $submission->task]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
