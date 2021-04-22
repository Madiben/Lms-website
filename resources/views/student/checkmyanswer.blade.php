@extends('front.base')

@section('content')
    @foreach ($submissions as $submission )
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{$submission->task['name']}}</p>
            </article>
            </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent">
                <article class="tile is-child box  is-6">
                    <p class="subtitle">Submitted On : {{$submission['created_at']}}</p>
                </article>
                <article class="tile is-child box  is-6">
                    <p class="subtitle">Grade : {{$submission['grade']}}</p>
                </article>
          </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child box notification is-primary">
                <p class="subtitle">Student Answer :</p>
                <div class="content">
                  <p>{{$submission['answer']}}</p>
                </div>
          </article>
          </div>
        </div>
        <div class="buttons">
            <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('task.shows',[ 'task' =>$submission->task ])}}">Back</a></button>
        </div>
        @endforeach

@endsection
