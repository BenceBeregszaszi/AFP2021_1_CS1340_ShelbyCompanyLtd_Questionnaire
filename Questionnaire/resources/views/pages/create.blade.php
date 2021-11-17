@extends('layouts.app')

@section('title') {{'Új kérdőív'}} @endsection

@section('content')
@if (Auth::check())

<div class="m-auto w-1/2 py-5">  
    <div class="text-center">
            <h1 class="text-3xl font-light">
                Új kérdőív
            </h1>
    </div>
</div>

<div class="flex justify-center">
<form action="/create/store" method="POST" class="px-10 py-5 bg-gray-100 rounded-lg my-5 form-input shadow-lg">

    @csrf

    <input type="text" name="kerdoiv_nev" placeholder="Kérdőív neve..." class="rounded mt-5 mb-3  p-3 text" size="80" required>
    

    <button type="submit" class="flex justify-center bg-green-600 rounded-md w-1/3 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500">Hozzáadás</button>
    
  </form>
  
</div>
<div class="p-5 text-center w-1/2 m-auto">
  <a href="{{ asset('settings') }}" class="text-2xl text-black">
        <div class="rounded-md py-3 px-6 transition hover:bg-gray-400">
         Mégse
        </div>
  </a>
</div>

@else
<div class="flex justify-center font-sans font-bold text-2xl text-white">
  <h1>Jelentkezzen be a megtekintéshez!</h1>
</div>

@endif

  @endsection