@extends('front.base')

@section('content')
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{$subject['name']}}</p>
            </article>
            </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent">
                <article class="tile is-child box  is-4">
                  <p class="subtitle">Semester : {{$subject['semester']}}</p>
                  <br>
                  <p class="subtitle">Credits : {{$subject['credit']}} </p>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Teacher Name : {{$subject->teacher['name']}}</p>
                    <br>
                    <p class="subtitle">Teacher Email : {{$subject->teacher['email']}}</p>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Number of Students : {{$subject['number-student']}}</p>
                    <br>
                    <p class="subtitle">Subject code : {{$subject['code']}}</p>
                </article>
          </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child box notification is-primary">
                <p class="subtitle">description subject</p>
                <div class="content">
                    <p>{{$subject['description']}}</p>
                  </div>
          </article>
          </div>
    </div>
    <div class="buttons">
        @if ($subject->students->find(Auth::id())==null)
        <button class="button is-danger is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.attach',['subject'=>$subject])}}">Join Subject</a></button>
        @else
        <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('task.list',['subject'=>$subject])}}">Check Tasks</a></button>
        <button class="button is-danger is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.detach',['subject'=>$subject])}}">Drop Subject</a></button>
        @endif

        <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('mysubject.list.t')}}">Back</a></button>
    </div>
@endsection
