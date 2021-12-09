<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function kitolt($id) {
        $numberOfQuestionnaire = DB::table('kerdoivs')->count('kerdoiv_id');
        if($numberOfQuestionnaire != 0)
        {
            $questionnaire = DB::table('kerdoivs')
            ->select('*')
            ->where('kerdoiv_id', '=',  $id)->first();

            $questions = DB::table('kerdeseks')
            ->select('*')
            ->where('kerdoiv_id', '=',  $id)->get();

            $answers_arr = [];
            foreach($questions as $question)
            {
                $question_id = $question->kerdes_id;
                $answers = DB::table('valaszoks')
                ->select('*')
                ->where('kerdes_id', '=', $question_id)->get();
                array_push($answers_arr, $answers);
            }
            return view('pages.kitolto', compact('numberOfQuestionnaire'))
            ->with('questionnaire',$questionnaire)
            ->with('questions',$questions)
            ->with('answers_arr',$answers_arr);
        }
        else{
            return view('pages.kitolto', compact('numberOfQuestionnaire'));
        }
    }
    
    public function charts() {
            $questionnaires = DB::table('kerdoivs')
            ->select('*')->get();

            $questions = DB::table('kerdeseks')
            ->select('*')->get();

            $answers_arr = [];
            foreach($questions as $question)
            {
                $question_id = $question->kerdes_id;
                $answers = DB::table('valaszoks')
                ->select('*')
                ->where('kerdes_id', '=', $question_id)->get();
                array_push($answers_arr, $answers);
            }
            return view('pages.highcharts')
            ->with('questionnaires',$questionnaires)
            ->with('questions',$questions)
            ->with('answers_arr',$answers_arr);
    }
    
    public function index() {
        $numberOfQuestionnaire = DB::table('kerdoivs')->count('kerdoiv_id');
        return view('pages.index')->with('numberOfQuestionnaire', $numberOfQuestionnaire);
}
        
