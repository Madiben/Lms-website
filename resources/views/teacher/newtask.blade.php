@extends('front.base')

@section('content')
    <form action="{{route('task.store',['subject'=>$subject ]) }}" method="POST">
        @csrf
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">Task Name : </p>
                <input name="name" class="input is-primary @error('name') is-invalid @enderror" type="text" placeholder="eg: Assignment Laravel"
                value="{{old('name','')}}">
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
                  <input name="deadline" class="input is-primary" type="datetime-local" placeholder="Primary input" value="2021-04-17T19:30"
                  min="2021-04-07T00:00" max="2030-06-14T00:00">
                  </div>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Points : </p>
                    <div class="control">
                    <input name="points" class="input is-primary" type="number" placeholder="50">
                    </div>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Subject name :</p>
                    <div class="control">
                        <div   class=" is-primary is-rounded is-fullwidth">
                            <p class="subtitle">{{$subject['name'] }}</p>
                        </div>
                    </div>
                </article>
          </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
                <article class="tile is-child box notification is-primary">
                    <p class="subtitle">description Task</p>
                    <div class="content">
                        <textarea name="description" class="textarea is-success @error('description') is-invalid @enderror" placeholder="task description" >{{old('description','')}}</textarea>
                        @error('description')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </article>
          </div>
        </div>
        <div class="buttons">
            <button class="button is-primary is-medium is-fullwidth is-rounded" type="submit">Submit Task</button>
        </div>
    </form>
    <div class="buttons">
        <br>
        <br>
        <br>
        <button class="button is-white is-medium is-fullwidth is-rounded" ><a style="color: inherit;" href="{{route('subject.tasks.list',[ 'subject' => $subject])}}">Back</a></button>
    </div>
@endsection
