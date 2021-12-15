@extends('layouts.app')

@section('title') {{'Kérdőív szerkesztése'}} @endsection

@section('content')

@if (Auth::check())

<div class="m-auto w-4/8 py-5">  
    <div class="text-center" id="cim">
            <h1 class="text-3xl font-light">
                <b>{{ $question->kerdes_szovege }}</b> kérdés válaszai
            </h1>
            <button class="mt-5 px-3 py-2 text-white font-light text-xl rounded-lg shadow-lg bg-green-600 transition hover:bg-green-400" id="changerButton">Kérdés módosítása</button>
    </div>
    <h2 class="text-center" style="color: red;" id ="response"></h2>
    <div class="text-center" id="cimChanger" style="display: none">
      <form action="/settings/change" method="POST">
        @csrf
        <input type="hidden" value="{{ $question->kerdes_id }}" name="idToChange" id = "hiddenQuestionId">
        <input type="hidden" value="kerdes" name="whatToChange">
        <input type="text" value = "{{ $question->kerdes_szovege }}" name="ujNev" style="font-size: 32px">
        <button type="submit" class="flex justify-center mt-5 bg-green-600 rounded-lg w-1/6 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500">Frissít</button>
      </form>
  
    </div>
</div>

<div class="flex justify-center">
  <div class="w-1/2">
      <div class="bg-gray-100 rounded-lg mt-5 shadow-lg">
        <div class="px-10 py-5 bg-gray-100 rounded-lg my-5 form-input shadow-lg">
          <table class="m-5 p-2">
              <thead class="text-center">
                  <td class="w-5/6 pt-4"></td>
                  <td class="w-min pt-4"></td>
                  <td class="w-min pt-4"></td>
              </thead>
              <tbody>
                @forelse ($answers as $answer)
                <tr class="pb-10 font-light">
                  <td>
                    <input type="text" class="InputProbaUpdate" data-id = "{{ $answer->valaszok_id }}" name="szoveg{{ $answer->valaszok_id }}" value="{{ $answer->valasz }}" class="rounded mt-5 mb-3 p-3 text" size="80" required>
                    <br>
                    <hr class="pt-5">
                  </td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
            <button type="button"  class="flex justify-center bg-green-600 rounded-md w-1/3 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500" id="ButtonProbaUpdate">Módosít</button>
          </div>
      </div>

  </div>

</div>
<div class="p-5 text-center w-1/2 m-auto">
  <a href="/settings/{{ $questionnaireId }}/edit" class="text-2xl text-black">
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