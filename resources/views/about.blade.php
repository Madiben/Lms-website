@extends('front.base')

@section('content')
        <div class="container">
          <h1 class="title is-primary" style="text-align: center;color:black">
               About Website
          </h1>
          <br>
        </div>
        <div style="text-align: center">
        <figure class="is-128x128" >
            <img class="is-rounded is-fullwidth" src="{{url('images/logo.jpg')}}">
          </figure>
          <p class="title"> Desginer Mahdi Bentaleb</p>
          <p class="title"> Neptun : ELKBLN</p>
          <p class="title">Email : mehdibentaleb22@gmail.com</p>
          <p class="subtitle">This LMS server assignment website is a homework for Web Enginner Subject was
              built in order to master and get full review about Laravel and web engineer
                in case you notice any bugs or problem contact me and i will fix</p>
          <h2> 2021 Copyright reserved for University of ELTE </h2>
        </div>
@endsection
