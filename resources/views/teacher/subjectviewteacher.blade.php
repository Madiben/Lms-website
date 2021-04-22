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
    <div class="content">
        <table class="table">
            <thead>
              <tr>
                <th title="ID">ID</th>
                <th title="Student">Student</th>
                <th title="Email">Email</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subject->students as $user )
                   <tr>
                        <th>{{$user['id']}}</th>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>
    <div class="buttons">
        <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.tasks.list', [ 'subject' => $subject ])}}">Check Tasks</a></button>
        <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.edit', [ 'subject' => $subject ])}}">Edit Subject</a></button>
        <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('mysubject.list.t', [ 'subject' => $subject ])}}">Back</a></button>
    </div>
@endsection
