@extends('layouts.app')

@section('title') {{'Statisztika'}} @endsection

@section('content')
<div class="flex justify-center" style="position: fixed;">
  <div class="w-screen row">
      <div style="overflow: auto;" class="column bg-gray-50 rounded-lg mt-12 ml-12 shadow-lg h-96	" id="felsorolas">
                @foreach ($questions as $question)
                        <div class="questionBtn text-2xl" data-id="{{ $question->kerdes_id }}">
                          {{ $question->kerdes_szovege }}
                        </div> 
                @endforeach
      </div>
      <div class="column text-2xl mt-12 ml-3 h-96" style="width: 30%;">
          <div id="container" style="width: 100%; height: 100%"></div>
      </div>   
      <div class="column text-2xl mt-12 h-96" style="width: 30%;">  
        <div id="container2" style="width: 100%; height: 100%"></div>
      </div>
  </div>
</div>

@endsection
