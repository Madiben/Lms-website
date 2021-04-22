@extends('front.base')

@section('content')
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{$task['name']}}</p>
            </article>
            </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent">
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Deadline Due : {{$task['deadline']}}</p>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Points : {{$task['points']}} </p>
                </article>

          </div>
        </div>
        <form method="POST" action="{{route('task.sendsolution',['task'=>$task])}}" style="width: 100%" >
            @csrf
            @method('PUT')
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child box notification is-primary">
                <p class="subtitle">Description Task :</p>
                <div class="content">
                  <p>{{$task['description']}}</p>
                </div>
                <p class="subtitle">Write the Solution :</p>
                <div class="content">
                    <textarea name="solution" class="textarea is-success "
                     placeholder="write your solution here" >{{old('solution',$task['solution'])}}</textarea>
                </div>
          </article>
          </div>
        </div>
        <div class="content">
            <table class="table">
                <thead>
                  <tr>
                    <th title="ID">ID</th>
                    <th title="Student">Student</th>
                    <th title="Email">Email</th>
                    <th title="createdat">Submitted at</th>
                    <th title="grade">Grade</th>
                    <th title="gradedon">Graded on</th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($task->submissions as $submission )
                       <tr>
                            <th>{{$submission['id']}}</th>
                            <td>{{$submission->student['name']}}</td>
                            <td>{{$submission->student['email']}}</td>
                            <td>{{$submission['created_at']}}</td>
                            @if ($submission->grade != null)
                                <td>{{$submission['grade']}}</td>
                                <td>{{$submission['updated_at']}}</td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
          <div class="buttons">

            <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" type="submit" >Send Solution</a></button>
          </div>
        </form>
        <div><br></div>
        <div class="buttons">
            <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('submission.show',[ 'task' => $task ])}}">Check Submittions for this Task</a></button>
            <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('task.edit',[ 'task' => $task ])}}">Edit Task</a></button>
            <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.tasks.list',[ 'subject' => $subject])}}">Back</a></button>
        </div>
@endsection
