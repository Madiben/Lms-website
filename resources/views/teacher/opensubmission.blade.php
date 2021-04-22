@extends('front.base')

@section('content')
<form action="{{route('submission.update', [ 'submission' => $submission ]) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">{{$submission->task->name}}</p>
            </article>
            </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent">
                <article class="tile is-child box  is-6">
                    <p class="subtitle">Submitted On : {{$submission['created_at']}}</p>
                    <p class="subtitle">Student name : {{$submission->student->name}}</p>
                    <p class="subtitle">Student email : {{$submission->student->email}}</p>

                </article>
                <article class="tile is-child box  is-5">
                    <p class="subtitle"> Grade :  </p>
                    <input name="grade" class="input is-primary  @error('grade') is-invalid @enderror" type="number"
                    min="1" max="{{$submission->task->points}}" value="{{old('grade',$submission['grade'])}}"> <p>Total possible points {{$submission->task->points}}</p>
                        @error('grade')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
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
            <button class="button is-primary is-medium is-fullwidth is-rounded"><a style="color: inherit;" type="submit">Evaluate</a></button>
        </div>
    </form>
        <div class="buttons">
            <button class="button is-white is-medium is-fullwidth is-rounded"><a style="color: inherit;" href="{{route('submissions.index',[ 'task' =>$submission->task ])}}">Back</a></button>
        </div>
@endsection
