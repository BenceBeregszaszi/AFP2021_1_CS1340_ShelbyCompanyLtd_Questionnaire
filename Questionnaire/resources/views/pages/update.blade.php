@extends('layouts.app')

@section('title') {{'Kérdőív szerkesztése'}} @endsection

@section('content')

@if (Auth::check())

<div class="m-auto w-4/8 py-5">  
    <div class="text-center">
            <h1 class="text-3xl font-light">
                Kérdés: <b>{{ $question_name }}</b>
            </h1>
    </div>
</div>




<div class="flex justify-center">
  <div class="w-1/2">
      <div class="bg-gray-100 rounded-lg mt-5 shadow-lg">
        <form action="/settings/{{ $id }}/update/store" method="POST" class="bg-gray-100 rounded-lg form-input shadow-lg">
          @csrf
          <p class="ml-5 pt-5 text-2xl font-light">Válaszok:</p>
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
                    <input type="text" name="szoveg{{ $answer->valaszok_id }}" value="{{ $answer->valasz }}" class="rounded p-3 text mb-4" size="50" required>
                    <br>
                  </td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
          <button type="submit" class="flex justify-center bg-green-600 rounded-md w-1/3 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500">Módosítás</button>
        </form>
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