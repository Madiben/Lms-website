@extends('front.base')

@section('content')
        <div class="container">
          <h1 class="title" style="text-align: center;">
               Welcome to Your Tasks
          </h1>
          <br>
          <div class="buttons">
            <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('task.create',[ 'subject' => $subject ])}}">Create Task</a></button>
        </div>
        </div>
        <div class="tile is-ancestor is-vertical">
            @foreach ($subject->tasks as $task)

            <div class="tile is-parent">
              <article class="tile is-child box notification is-primary">
                <a style="text-decoration-line: none;" href="{{route('task.showt', [ 'task' => $task])}}">
                <p class="title">{{$task['name']}}</p>
                <p class="subtitle">Points : {{$task['points']}}</p>
                <p class="subtitle">Deadline Due : {{$task['deadline']}}</p>
                </a>
                </article>
            </div>
            @endforeach
          </div>
@endsection
