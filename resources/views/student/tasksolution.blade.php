@extends('front.base')

@section('content')
<div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{$task['name']}} </p>
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
                @if ($task->solution != null)
                <p class="subtitle">Solution :</p>
                <div class="content">
                    <p>{{$task['solution']}}</p>
                </div>
                @else
                <p class="subtitle">Solution Still not published</p>
                @endif

          </article>
          </div>
    </div>
<div class="buttons">
            <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('task.shows', [ 'task' => $task ])}}">Back</a></button>
        </div>
@endsection
