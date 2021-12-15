@extends('layouts.app')

@section('title') {{'Beállítások'}} @endsection

@section('content')

  @if (Auth::check())

  @if (Session::has('message'))
    <div class="flex justify-center font-sans text-center">
      <div class="w-full md:w-1/2 mb-10">                     
        <div class="px-5 text-2xlfont-light">{{ Session::get('message') }}</div>
      </div>
    </div>
  @endif
  
  <div class="p-5 text-center w-1/2 m-auto">
    <a href="/create" class="text-2xl text-black">
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

                      <tr id="questionnaire{{ $questionnaire->kerdoiv_id }}"class="pb-10 font-light">
                        <td>
                          <ul>
                            <a href = "/kitolt/{{ $questionnaire->kerdoiv_id }}">
                              <li class="text-2xl">{{ $questionnaire->kerdoiv_nev }}</li> 
                            </a>
                          </ul>
                          <br>
                           <hr class="pt-5">
                        </td>
                        <td class="p-2 m-1/3">
                          <button  class="copyBtn p-3 text-center text-lg font-light rounded-lg bg-red-600 transition hover:bg-red-800"
                          name="linkCopier" type="button" value="http://127.0.0.1:8000/kitolt/{{ $questionnaire->kerdoiv_id }}">Link</button>  
                        
                        </td>
                        <td class="p- m-1/3"><a href="/settings/{{ $questionnaire->kerdoiv_id }}/edit">
                          <p class="p-3 text-center text-lg rounded-lg bg-yellow-300 transition hover:bg-yellow-400"> Módosítás </p>
                         </a>
                        
                        <td class="p-2 m-1/3 text-white">
                          <input type="hidden" name="hiddenid" value="{{ $questionnaire->kerdoiv_id }}">
                          <button class="deleteBtn p-3 text-center text-lg font-light rounded-lg bg-red-600 transition hover:bg-red-800"
                          data-id="{{ $questionnaire->kerdoiv_id }}" data-type="questionnaire"  name="id" type="button">Törlés</button> 
                          
                       </td>
                      </tr>
                      @empty
                        Nincs kérdés
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
