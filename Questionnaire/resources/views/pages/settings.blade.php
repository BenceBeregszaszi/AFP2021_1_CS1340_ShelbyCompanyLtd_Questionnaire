@extends('layouts.app')

@section('title') {{'Beállítások'}} @endsection

@section('content')

  @if (Auth::check())

  @if (Session::has('message'))
    <div class="flex justify-center font-sans font-light text-center">
      <div class="w-full md:w-1/2 mb-10">                     
        <div class="px-5 text-2xl">{{ Session::get('message') }}</div>
      </div>
    </div>
  @endif
  
  <div class="p-5 text-center w-1/2 m-auto">
    <a href="{{ asset('create') }}" class="text-2xl text-black">
          <div class="bg-green-600 shadow-lg text-white font-light rounded-lg py-3 px-6 transition hover:bg-green-500 hover:text-white">
           +  Új kérdőív
          </div>
    </a>
  </div>
  
    <div class="flex justify-center">
        <div class="w-1/2">
            <label for="editQuestions" class="text-3xl font-light mb-5">Kérdőívek</label>
            <div class="bg-gray-100 rounded-lg mt-5 shadow-lg">
                <table class="m-5 p-2">
                    <thead class="text-center">
                        <td class="w-5/6 pt-4"></td>
                        <td class="w-min pt-4"></td>
                        <td class="w-min pt-4"></td>
                    </thead>
                    <tbody>
                      
                      @forelse ($questionnaires as $questionnaire)

                      <tr class="pb-10 font-light">
                        <td>
                          <ul>
                            <li class="text-2xl">{{ $questionnaire->kerdoiv_nev }}</li> 
                          </ul>
                          <br>
                           <hr class="pt-5">
                        </td>
                        <td class="p-2 m-1/3"><a href="/settings/{{ $questionnaire->kerdoiv_id }}/edit">
                         <p class="p-2 text-center text-lg rounded-md bg-yellow-300 transition hover:bg-yellow-400"> Módosítás </p>
                        </a>
                        <td class="p-2 m-1/3 text-white">
                          <form action="/delete/questionnaire" method="POST">
                              @csrf
                              <input type="hidden" name="hiddenid" value="{{ $questionnaire->kerdoiv_id }}">
                              <button class="p-2 text-center text-lg font-light rounded-md bg-red-600 transition hover:bg-red-800"
                                 name="id" type="submit" value="{{ $questionnaire -> id }}">Törlés</button>                   
                           </form>
                       </td>
                      </tr>
                      @empty
                        <p class="text-center font-light text-3xl">Nincs kérdőív</p>
                      </div>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
  @else
    <div class="flex justify-center font-sans font-bold text-2xl text-white">
      <h1>Jelentkezzen be a beállítások megtekintéséhez!</h1>
    </div>

  @endif

@endsection