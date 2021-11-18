<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $numberOfQuestionnaire = DB::table('kerdoivs')->count('kerdoiv_id');
        if($numberOfQuestionnaire != 0)
        {
            $questionnaire = DB::table('kerdoivs')
            ->select('*')
            ->orderby('kerdoiv_id')->first();

            $questionnaire_id = $questionnaire->kerdoiv_id;
            $questions = DB::table('kerdeseks')
            ->select('*')
            ->where('kerdoiv_id', '=',  $questionnaire_id)->get();

            $answers_arr = [];
            foreach($questions as $question)
            {
                $question_id = $question->kerdes_id;
                $answers = DB::table('valaszoks')
                ->select('*')
                ->where('kerdes_id', '=', $question_id)->get();
                array_push($answers_arr, $answers);
            }
            return view('pages.index', compact('numberOfQuestionnaire'))
            ->with('questionnaire',$questionnaire)
            ->with('questions',$questions)
            ->with('answers_arr',$answers_arr);
        }
        else{
            return view('pages.index', compact('numberOfQuestionnaire'));
        }
       
    }
}
        
