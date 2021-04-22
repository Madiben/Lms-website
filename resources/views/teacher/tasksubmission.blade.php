@extends('front.base')

@section('content')
        <div class="container">
          <h1 class="title" style="text-align: center;">
               Welcome to Task submissions
          </h1>
          <br>
        </div>
        <div class="tile is-ancestor is-vertical">
            @foreach ($submissions as $submission)
            <div class="tile is-parent">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{ $submission->task['name']}} </p>
                <p class="subtitle">{{$submission['created_at']}}</p>
                <p class="subtitle">{{$submission->student['name']}}</p>
                <p class="subtitle">{{$submission->student['email']}}</p>
                @if ($submission->grade != null)
                    <p class="subtitle">Graded : {{$submission->grade}}</p>
                @else
                    <p class="subtitle">Not graded yet !!</p>
                @endif
                <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('submission.edit',[ 'submission' => $submission])}}">Evaluate</a></button>
            </article>
            </div>
            @endforeach
        </div>
@endsection
