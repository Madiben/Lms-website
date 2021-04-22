@extends('front.base')

@section('content')
    <form action="{{route('subject.store')}}" method="POST">
        @csrf
        <div class="tile is-ancestor ">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child box notification is-primary">
                <p class="title">Subject Name</p>
                <input name="name" class="input is-primary @error('name') is-invalid @enderror" type="text" placeholder="eg: Math1" value="{{old('name','')}}">
                @error('name')
                    <p class="help is-danger">{{$message}}</p>
                @enderror
            </article>
            </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent">
                <article class="tile is-child box  is-4">
                  <p class="subtitle">Semester : </p>
                  <div class="control">
                  <input name="semester" class="input is-primary" type="number" placeholder="2" max="6" min="1">
                  </div>
                  <br>
                  <p class="subtitle">Credits :  </p>
                  <div class="control">
                    <input name="credit" class="input is-primary  @error('credit') is-invalid @enderror" type="number" placeholder="5"
                    min="1" max="5">
                        @error('credit')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </article>
                <article class="tile is-child box  is-4">
                    <p class="subtitle">Number of Students </p>
                    <div class="control">
                        <input name="number-student" class="input" type="text" value="25">
                      </div>
                      <br>
                      <p class="subtitle">Subject Code</p>
                    <div class="control">
                        <input name="code" class="input @error('code') is-invalid @enderror" type="text" pattern="IK-[A-Z]{3}[0-9]{3}" placeholder="eg: IK-ALF990">
                            @error('code')
                                <p class="help is-danger">{{$message}}</p>
                            @enderror
                    </div>
                </article>
          </div>
        </div>
        <div class="tile is-ancestor ">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child box notification is-primary">
                <p class="subtitle">description subject</p>
                <div class="content">
                    <textarea name="description" class="textarea is-success @error('description') is-invalid @enderror" placeholder="Subject description" >{{old('description','')}}</textarea>
                    @error('description')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
          </article>
          </div>
        </div>
        <div class="buttons">
            <button class="button is-primary is-medium is-fullwidth is-rounded" type="submit">Submit Subject</button>
        </div>
    </form>
    <div class="buttons">
        <br>
        <br>
        <br>
        <button class="button is-white is-medium is-fullwidth is-rounded" ><a style="color: inherit;" href="{{route('mysubject.list.t')}}">Back</a></button>
    </div>
@endsection
