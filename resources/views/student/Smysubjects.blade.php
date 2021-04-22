@extends('front.base')

@section('content')
    <div class="container">
      <h1 class="title" style="text-align: center;">
           Welcome Your Subjects
      </h1>
      <br>
    </div>
    <div class="tile is-ancestor is-vertical">
        @foreach ($subjects as $subject)
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
@endsection
