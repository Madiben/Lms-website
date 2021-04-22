@extends('front.base')

@section('content')
    <div class="container">
      <h1 class="title" style="text-align: center;">
           Welcome my Subjects
      </h1>
      <br>
      <div class="buttons">
        <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('subject.create')}}">Create Subject</a></button>
    </div>
    </div>
    <div class="tile is-ancestor is-vertical">
        @foreach ($subjects as $subject)
            <div class="tile is-parent" >
                <article class="tile is-child box notification is-primary">
                <a style="text-decoration-line: none;" href="{{route('subject.showt', [ 'subject' => $subject ])}}">
                 <p class="title">{{$subject['name']}}</p>
                 <p class="subtitle">Code : {{$subject['code']}}</p>
                 <p class="subtitle">Credit : {{$subject['credit']}}</p>
                 <div class="content">
                     <p>{{$subject['description']}}  </p>
                 </div>
                </a>
                </article>
            </div>
        @endforeach
    </div>
@endsection
