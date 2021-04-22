<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectFormRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('student/allsubjects',['subjects' => $subjects]);
    }
    public function index_mysubjects_teacher()
    {
        //$subjects = Subject::where('teacher-id', Auth::id())->get();
        return view('teacher/mysubjects',['subjects' => Auth::user()->teacher_subjects]);
    }
    public function index_mysubjects_student()
    {
        return view('student/Smysubjects',['subjects' => Auth::user()->student_subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/newsubject');
    }

    public function attach(Subject $subject)
    {
        $subject->students()->attach(Auth::id());
        return redirect()->route('mysubject.list.s', [ 'subject' => $subject]);
    }

    public function detach(Subject $subject)
    {
        $subject->students()->detach(Auth::id());
        return redirect()->route('mysubject.list.s', [ 'subject' => $subject]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectFormRequest $request)
    {
       $validated_data= $request->validated();
        $validated_data['user_id']=Auth::id();
       //store data in database ($validated_data)
       Subject::create($validated_data);
        return redirect()->route('mysubject.list.t');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showteacher(Subject $subject)
    {
      return view('teacher/subjectviewteacher',
       [ "subject" =>$subject]
      );
    }
    public function showstudent(Subject $subject)
    {
      return view('student/subjectview',
       [ "subject" =>$subject]
      );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
         return view('teacher/editsubject',
         [ "subject" =>$subject]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectFormRequest $request,Subject $subject)
    {
        $validated_data= $request->validated();
        $subject->update($validated_data);

        return redirect()->route('mysubject.list.t');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        if($subject != null)
        {
            $subject->delete();
        }
        return redirect()->route('mysubject.list.t');
    }
}
