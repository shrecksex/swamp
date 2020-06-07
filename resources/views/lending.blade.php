@extends('layouts.layout')
@section('content')
  <div class="container" id="app">
    <div class="row white py-5 px-4">
      <div class="col-12 ">
        <h1 class="text-center"><b>Инструкция</b></h1>
        <h4 class="mt-5">Быстрый доступ</h4>
        <ol>
          @foreach($headers as $header)
          <li><a href="#{{$header->id}}">{{$header->header}}</a></li>
          @endforeach
        </ol>
      </div>
      </div>

      @foreach($headers as $header)
      <div class="row white py-3 mt-5 px-4">
      <div class="col-12 mt-5" id="{{$header->id}}">
        <h5><b>{{$header->header}}</b></h5>

        @foreach($texts[$header->id] as $text)
        <p style="white-space: pre-line;">
          {{$text->texts}}
        </p>
        @endforeach

        </div>
      </div>
      @endforeach


  </div>
@endsection
