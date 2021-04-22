@extends('front.base')

@section('content')

<form action="{{route('submission.store',['task'=>$task ]) }}" method="POST">
    @csrf
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{$task['name']}} </p>
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
                <article class="tile is-child box  is-4">
                    <p class="subtitle">{{$subject['name']}}</p>
                </article>
          </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child box notification is-primary">
                <p class="subtitle">Description Task :</p>
                <div class="content">
                  <p>{{$task['description']}}</p>
                </div>
                <p class="subtitle">Write down your answer :</p>
                <div class="content">
                    <textarea name="answer" class="textarea is-success "
                     placeholder="write your answer here" >{{old('answer','')}}</textarea>
                </div>
          </article>
          </div>
    </div>
          <div class="buttons">
            <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" type="submit">Submit Your Work Task</a></button>
          </div>
</form>
<br>
<div class="buttons">
           <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('task.solution',['task' =>$task])}}">Task Solution</a></button>
            <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.tasks.list',[ 'subject' =>$subject])}}">Back</a></button>
        </div>
@endsection
