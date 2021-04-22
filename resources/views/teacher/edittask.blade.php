@extends('front.base')

@section('content')
    <form action="{{route('task.update', [ 'task' => $task ]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">Task Name</p>
                <input name="name" class="input is-primary @error('name') is-invalid @enderror" type="text" placeholder="eg: Assignment Laravel"
                value="{{old('name',$task['name'])}}">
                @error('name')
                    <p class="help is-danger">{{$message}}</p>
                @enderror
              </article>
            </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent">
                <article class="tile is-child box  is-4">
                  <p class="subtitle">Deadline : </p>
                  <div class="control">
                  <input name="deadline" class="input is-primary" type="datetime-local"
                   value="{{old('deadline',$task['deadline'])}}"
                  min="2021-01-01T01:00" max="2030-06-14T00:00">
                  </div>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Points :  </p>
                    <div class="control">
                    <input name="points" class="input is-primary" type="number" placeholder="50" min="1" max="100"
                        value="{{old('points',$task['points'])}}">
                    </div>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Subject :  </p>
                    <div class="control">
                    <input name="subject_id" class="input is-primary" type="number" value="{{$task['subject_id']}}" readonly>
                    </div>
                </article>

          </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
                <article class="tile is-child box notification is-primary">
                    <p class="subtitle">description Task</p>
                    <div class="content">
                        <textarea name="description" class="textarea is-success @error('description') is-invalid @enderror"
                         placeholder="task description" >{{old('description',$task['description'])}}</textarea>
                        @error('description')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </article>
          </div>
        </div>
        <div class="buttons">
            <button class="button is-primary is-medium is-fullwidth is-rounded" type="submit">Save Task</button>
        </div>
    </form>
    <div class="buttons">
        <br>
        <br>
        <br>
        <form method="POST" action="{{route('task.delete',['task'=>$task])}}" style="width: 100%" >
            @csrf
            @method('DELETE')
            <button class="button is-danger is-medium is-fullwidth is-rounded" type="submit">Delete Task</button>
        </form>
        <button class="button is-white is-medium is-fullwidth is-rounded" ><a style="color: inherit;" href="{{route('subject.tasks.list',[ 'subject' => $task->subject])}}">Back</a></button>
    </div>
@endsection
