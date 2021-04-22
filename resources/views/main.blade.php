@extends('front.base')

@section('content')
        <div class="container">
          <h1 class="title" style="text-align: center;">
               Welcome to Learning Spot
          </h1>

        </div>
        <br>
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box notification is-primary">
                @auth
                    @if (Auth::user()->is_teacher)
                    <p class="title">Students</p>

                    <p class="title">{{ $user->where('is_teacher',0)->count()}}</p>
                    <div class="content">
                        <p>This is the number of all registered Student in this website</p>
                      </div>
                    @else
                    <p class="title">Teachers</p>

                    <p class="title">{{ $user->where('is_teacher',1)->count()}}</p>
                    <div class="content">
                        <p>This is the number of all registered Teachers in this website</p>
                      </div>
                    @endif
                @else
                    <p class="title">Users</p>
                    <p class="title">{{ $user->count()}}</p>
                    <div class="content">
                        <p>This is the number of all registered Users in this website</p>
                      </div>
                @endauth
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">Subjects</p>
                <p class="title">{{ $subject->count()}}</p>
                <div class="content">
                    <p>This is the number of all Subjects in this website</p>
                  </div>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box notification is-primary">
                <p class="title">Tasks</p>
                <p class="title">{{ $task->count()}}</p>
                <div class="content">
                  <p>This is the number of all Tasks in this website</p>
                </div>
              </article>
            </div>
        </div>
        @auth
          @if (Auth::user()->is_teacher)
             <div class="tile is-ancestor is-vertical">
                @foreach (Auth::user()->teacher_subjects as $subject)
                    <div class="tile is-parent" >
                        <article class="tile is-child box notification is-primary">
                        <a style="text-decoration-line: none;" href="{{route('subject.showt', [ 'subject' => $subject ])}}">
                        <p class="title">{{$subject['name']}}</p>
                        <p class="subtitle">Code : {{$subject['code']}}</p>
                        <p class="subtitle">Credit : {{$subject['credit']}}</p>
                        <p class="subtitle">Teacher Name : {{$subject->teacher['name']}}</p>
                        <div class="content">
                             <p>{{$subject['description']}}  </p>
                        </div>
                        </a>
                        </article>
                    </div>
                @endforeach
            </div>
          @else
          <div class="tile is-ancestor is-vertical">
            @foreach (Auth::user()->student_subjects as $subject)
                <div class="tile is-parent" >
                    <article class="tile is-child box notification is-primary">
                    <a style="text-decoration-line: none;" href="{{route('subject.shows', [ 'subject' => $subject ])}}">
                     <p class="title">{{$subject['name']}}</p>
                     <p class="subtitle">Code : {{$subject['code']}}</p>
                     <p class="subtitle">Credit : {{$subject['credit']}}</p>
                     <p class="subtitle">Teacher Name : {{$subject->teacher['name']}}</p>
                     <div class="content">
                         <p>{{$subject['description']}}  </p>
                     </div>
                    </a>
                    </article>
                </div>
            @endforeach
            </div>
        @endif
    @endauth
@endsection
