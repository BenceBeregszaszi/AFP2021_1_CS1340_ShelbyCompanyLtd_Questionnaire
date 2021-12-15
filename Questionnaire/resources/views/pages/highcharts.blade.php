@extends('layouts.app')

@section('title') {{'Statisztika'}} @endsection

@section('content')

@if (Auth::check())

  @if (Session::has('message'))
    <div class="flex justify-center font-sans text-center">
      <div class="w-full md:w-1/2 mb-10">                     
        <div class="px-5 text-2xlfont-light">{{ Session::get('message') }}</div>
      </div>
    </div>
  @endif
<div class="flex justify-center" style="position: fixed;">
  <div class="w-screen row">
      <div style="overflow: auto; height: 65%" class="column bg-gray-50 rounded-lg mt-8 ml-6 shadow-lg" id="felsorolas">
                @foreach ($questions as $question)
                        <div class="questionBtn text-2xl" data-id="{{ $question->kerdes_id }}">
                          {{ $question->kerdes_szovege }}
                        </div> 
                @endforeach
      </div>
      <div class="column text-2xl mt-8 ml-3" style="width: 30%;">
          <div id="container" style="width: 100%; height: 100%"></div>
      </div>   
      <div class="column text-2xl mt-8" style="width: 30%;">  
        <div id="container2" style="width: 100%; height: 100%"></div>
      </div>
      
  </div>
</div>


@endif
@endsection
