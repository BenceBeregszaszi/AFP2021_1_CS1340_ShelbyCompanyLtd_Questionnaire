@extends('layouts.app')

@section('title') {{'Előoldal'}} @endsection

@section('content')

    <div class="flex justify-center font-sans">

        <div class="flex justify-center @if ($numberOfQuestionnaire < 1) w-full @endif">
            
            <div class="shadow-lg font-light bg-gray-100 p-7 rounded-lg content-center px-10"> <!--width 3 out of 4, background white, padding 6, rounded edges-->
                @if ($numberOfQuestionnaire < 1)
                    <p class="w-full p-5 text-lg lg:text-3xl text-center">Jelenleg nincs kérdés az adatbázisban!</p>
                @else
                    <p class="text-4xl text-center">{{ $questionnaire->kerdoiv_nev }}</p>
                    <form action="/send" method="POST" class="px-10 py-5 bg-gray-100 rounded-lg my-5">
                        @csrf
                        
                        <table class="m-5 p-2 table-auto">
                            <thead>
                                <td class="text-2xl">Neme:</td>
                                <td class="text-2xl pl-5">Életkora:</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="radio" name="neme" id="ferfi" value="Férfi">
                                        <label class="pl-2 text-xl" for="ferfi">Férfi</label>
                                    </td>
                                    <td>
                                        <input type="number" name="eletkora" class="w-15 px-2 py-3 rounded bg-white m-5">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" name="neme" id="no" value="Nő">
                                        <label class="pl-2 text-xl" for="no" class="text-3xl mb-5">Nő</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" name="neme" id="egyeb" value="Egyéb">
                                        <label class="pl-2 text-xl" for="egyeb" class="text-3xl mb-5">Egyéb</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <hr class="pt-5">
                        <br>
                        @foreach ($questions as $question)
                            <div class="mb-5">
                                <p class="text-2xl mb-3">{{ $question->kerdes_szovege }}</p>
                                @foreach ($answers_arr as $answers)
                                    @foreach ($answers as $answer)
                                        @if($answer->kerdes_id == $question->kerdes_id)
                                            <input type="radio" name="kerdes{{ $question->kerdes_id }}" id="{{ $answer->valaszok_id }}" value="{{ $answer->valasz }}">
                                            <label for="{{ $answer->valaszok_id }}" class="text-lg pl-3">{{ $answer->valasz }}</label><br>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        @endforeach
                        <button type="submit" class="flex justify-center bg-green-600 rounded-md w-1/3 m-auto text-gray-100 text-xl font-light py-2 transition hover:bg-green-500">Küldés</button>
                    </form>
                @endif
            </div>
        </div>

    </div>
@endsection