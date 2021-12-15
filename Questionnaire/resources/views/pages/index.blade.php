@extends('layouts.app')

@section('title') {{'Előoldal'}} @endsection

@section('content')

    <div class="flex justify-center font-sans">

        <div class="flex justify-center @if ($numberOfQuestionnaire < 1) w-full @endif">
            
            <div class="w-4/4 shadow-lg bg-gray-100 p-7 rounded-lg content-center px-10">
                @if ($numberOfQuestionnaire < 1)
                    <p class="w-full p-5 font-light text-lg lg:text-3xl text-center">Jelenleg nincs kérdés az adatbázisban!</p>
                @else
                    <button type="button" id="getRandomQuestionnaire" class="flex justify-center bg-green-600 rounded-md w-1/3 m-auto py-2 px-2 text-gray-100 text-xl font-light transition hover:bg-green-500">Véletlenszerű kérdőív kérése</button>
                    </form>
                @endif
            </div>
        </div>

    </div>
@endsection
