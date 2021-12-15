@extends('layouts.app')

@section('title') {{'Kérdőív szerkesztése'}} @endsection

@section('content')

@if (Auth::check())

<div class="m-auto w-4/8 py-5">  
    <div class="text-center" id="cim">
            <h1 class="text-3xl font-light">
                <b>{{ $questionnaire->kerdoiv_nev }}</b> kérdőív kérdései
            </h1>
            <button id="changerButton">Változtat</button>
    </div>
    <div class="text-center" id="cimChanger" style="display: none">
      <form action="/settings/change" method="POST">
        @csrf
        <input type="hidden" value="{{ $questionnaire->kerdoiv_id }}" name="idToChange">
        <input type="hidden" value="kerdoiv" name="whatToChange">
        <input type="text" value = "{{ $questionnaire->kerdoiv_nev }}" name="ujNev" style="font-size: 32px">
        <button type="submit" class="flex justify-center bg-green-600 rounded-md w-1/6 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500">Frissít</button>
      </form>
    </div>

</div>

<div class="flex justify-center">
  <div class="w-1/2">
      <label for="ListEditableQuestions" class="text-3xl font-light mb-5">Kérdések</label>
      <div class="bg-gray-100 rounded-lg mt-5 shadow-lg">
          <table class="m-5 p-2">
              <thead class="text-center">
                  <td class="w-5/6 pt-4"></td>
                  <td class="w-min pt-4"></td>
                  <td class="w-min pt-4"></td>
              </thead>
              <tbody>
                
                @forelse ($questions as $question)

                <tr class="pb-10 font-light" id="question{{ $question->kerdes_id }}">
                  <td>
                    <ul>
                      <li class="text-2xl">{{ $question->kerdes_szovege }}</li> 
                    </ul>
                    <br>
                     <hr class="pt-5">
                  </td>
                  <td class="p-2 m-1/3"><a href="/settings/{{ $question->kerdes_id }}/update">
                   <p class="p-2 text-center text-lg rounded-md bg-yellow-300 transition hover:bg-yellow-400"> Módosítás </p>
                  </a>
                  <td class="p-2 m-1/3 text-white">
                    <form action="/delete/question" method="POST">
                        @csrf
                        <input type="hidden" name="hiddenid" value="{{ $question->kerdes_id }}">
                        <button class="deleteBtn p-2 text-center text-lg font-light rounded-md bg-red-600 transition hover:bg-red-800"
                        data-id="{{ $question->kerdes_id }}" data-type="question"  name="id" type="button">Törlés</button>               
                     </form>
                 </td>
                </tr>
                
                @empty
                @endforelse
              </tbody>
            </table>
            <form action="/create/addquestions/{{ $id }}" method="get" class="px-10 py-5 bg-gray-100 rounded-lg my-5 form-input shadow-lg">

              @csrf
              <button type="submit" class="flex justify-center bg-green-600 rounded-md w-1/3 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500">Kérdés hozzáadása</button>
              
            </form>
      </div>

  </div>

</div>
<div class="p-5 text-center w-1/2 m-auto">
  <a href="{{ asset('settings') }}" class="text-2xl text-black">
        <div class="rounded-lg py-3 px-6 transition font-light hover:bg-gray-400">
         Mégse
        </div>
  </a>
</div>

@else
<div class="flex justify-center font-sans font-bold text-2xl">
  <h1>Jelentkezzen be a megtekintéshez!</h1>
</div>

@endif
@endsection
