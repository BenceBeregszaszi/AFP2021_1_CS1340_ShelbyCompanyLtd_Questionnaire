<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerdoiv;
use App\Models\Kerdesek;
use App\Models\Valaszok;
use Symfony\Component\Console\Question\Question;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Kerdoiv::all();

        return view('pages.settings',[
            'questionnaires' => $questionnaires
        ]);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kerdoiv_nev' => 'required'
        ]);

        $question = Kerdoiv::create([
            'kerdoiv_nev' => $request ->input('kerdoiv_nev')
        ]);
        $nev = $request ->input('kerdoiv_nev');
        
        $id = DB::getPdo()->lastInsertId();
        return redirect('create/addquestions/'.$id);
    }

    public function add($id)
    {
        $name = DB::table('kerdoivs')
            ->select('kerdoiv_nev')
            ->where('kerdoiv_id', '=', $id)->first();
        $param = $name->kerdoiv_nev;
        $count = DB::table('kerdeseks')->select('kerdes_id')->where('kerdoiv_id','=',$id)->count();
        $url = '/create/addquestions/'.$id.'/store';
        return view('pages.add')->with('id',$id)->with('name',$param )->with('url',$url)->with('dbszam',$count);
    }
    
    public function storeQuestions(Request $request)
    {
        $request->validate([
            'kerdes_szovege' => 'required',
            'ans1' => 'required',
            'ans2' => 'required',
            'ans3' => 'required',
            'ans4' => 'required',
            'ans5' => 'required'
        ]);

        $question = Kerdesek::create([
            'kerdoiv_id' => $request ->input('kerdoiv_id'),
            'kerdes_szovege' => $request ->input('kerdes_szovege')
        ]);
        $id = DB::getPdo()->lastInsertId();

        DB::insert('insert into valaszoks (kerdes_id, valasz, fiatalok, kozepkoruak, idosek, ferfi, no, egyeb) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $request -> input('ans1'), 0,0,0,0,0,0]);
        DB::insert('insert into valaszoks (kerdes_id, valasz, fiatalok, kozepkoruak, idosek, ferfi, no, egyeb) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $request -> input('ans2'), 0,0,0,0,0,0]);
        DB::insert('insert into valaszoks (kerdes_id, valasz, fiatalok, kozepkoruak, idosek, ferfi, no, egyeb) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $request -> input('ans3'), 0,0,0,0,0,0]);
        DB::insert('insert into valaszoks (kerdes_id, valasz, fiatalok, kozepkoruak, idosek, ferfi, no, egyeb) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $request -> input('ans4'), 0,0,0,0,0,0]);
        DB::insert('insert into valaszoks (kerdes_id, valasz, fiatalok, kozepkoruak, idosek, ferfi, no, egyeb) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $request -> input('ans5'), 0,0,0,0,0,0]);

        $id = $request ->input('kerdoiv_id');
        return redirect('create/addquestions/'.$id);
    }
    
    public function sendResults(Request $request)
    {
        $eletkor = $request->input('eletkora');
        $nem = $request->input('neme');
        
        $questionnaire = DB::table('kerdoivs')
            ->select('*')
            ->orderby('kerdoiv_id')->first();
        $questionnaire_id = $questionnaire->kerdoiv_id;
        $questions = DB::table('kerdeseks')
            ->select('*')
            ->where('kerdoiv_id', '=',  $questionnaire_id)->get();
        foreach($questions as $question)
        {
            $valasz = $request->input('kerdes'.$question->kerdes_id);
            $kivalasztott = DB::table('valaszoks')
                    ->select('*')
                    ->where([
                        ['kerdes_id', '=', $question->kerdes_id],
                        ['valasz', '=', $valasz]])
                        ->first();
            $ferfiakSzama = $kivalasztott->ferfi;
            $nokSzama = $kivalasztott->no;
            $egyebSzama = $kivalasztott->egyeb;
            $fiatalokSzama = $kivalasztott->fiatalok;
            $kozepkoruakSzama = $kivalasztott->kozepkoruak;
            $idosekSzama = $kivalasztott->idosek;
            if($nem == "Férfi")
            {
                    DB::table('valaszoks')->where([
                        ['kerdes_id', '=', $question->kerdes_id],
                        ['valasz', '=', $valasz]])
                        ->update(
                            ['ferfi' => $ferfiakSzama+1]
                    );
            }
            else if($nem == "Nő")
            {  
                DB::table('valaszoks')->where([
                        ['kerdes_id', '=', $question->kerdes_id],
                        ['valasz', '=', $valasz]])
                    ->update(
                        ['no' => $nokSzama+1]
                    );
            }
            else if($nem == "Egyéb")
            {
                DB::table('valaszoks')->where([
                    ['kerdes_id', '=', $question->kerdes_id],
                    ['valasz', '=', $valasz]])
                ->update(
                    ['egyeb' =>  $egyebSzama+1]
                );
            }
            if($eletkor >= 0 and $eletkor <=25)
            {                
                DB::table('valaszoks')->where([
                    ['kerdes_id', '=', $question->kerdes_id],
                    ['valasz', '=', $valasz]])
                    ->update(
                        ['fiatalok' => $ferfiakSzama+1]
                    );
            }
            else if($eletkor >= 26 and $eletkor <=55)
            {
                DB::table('valaszoks')->where([
                    ['kerdes_id', '=', $question->kerdes_id],
                    ['valasz', '=', $valasz]])
                    ->update(
                        ['kozepkoruak' => $kozepkoruakSzama+1]
                    );
            }
            else
            {
                DB::table('valaszoks')->where([
                    ['kerdes_id', '=', $question->kerdes_id],
                    ['valasz', '=', $valasz]])
                    ->update(
                        ['idosek' => $idosekSzama+1]
                    ); 
            }
        }
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = DB::table('kerdoivs')
        ->select('*')
        ->where('kerdoiv_id', '=', $id)->first();
        $questionnaire_name = $questionnaire->kerdoiv_nev;
        $questions = DB::table('kerdeseks')
        ->select('*')
        ->where('kerdoiv_id', '=', $id)->get();
        return view('pages.edit')->with('questionnaire_name', $questionnaire_name)->with('questions',$questions)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {   $question = DB::table('kerdeseks')
        ->select('*')
        ->where('kerdes_id', '=', $id)->first();
        $question_name = $question->kerdes_szovege;
        $questionnaire = DB::table('kerdeseks')
        ->select('*')
        ->where('kerdes_id', '=', $id)->first();
        $questionnaire_id = $question->kerdoiv_id;
        $answers = DB::table('valaszoks')
        ->select('*')
        ->where('kerdes_id', '=', $id)->get();
        return view('pages.update')->with('question_name', $question_name)->with('answers',$answers)->with('id',$id)->with('questionnaireId',$questionnaire_id);
    }

    public function updateQuestions(Request $request,$id)
    {   
        $answers = DB::table('valaszoks')
        ->select('*')
        ->where('kerdes_id', '=', $id)->get();
        foreach ($answers as $answer) {
            $helyettesito = $request->input("szoveg".$answer->valaszok_id);
            DB::table('valaszoks')->where('valaszok_id', $answer->valaszok_id)->update(array('valasz' => $helyettesito));
        }
        return redirect('/settings')->with('message','Sikeres módosítás!');
    }
/**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyQuestion(Request $request)
    {   
        $id = $request -> input('hiddenid');
        DB::delete('delete from kerdeseks where kerdes_id = ?',[$id]);
        return redirect('/settings')->with('message','A kérdés törlése sikeresen megtörtént!');
    }
    public function destroyQuestionnaire(Request $request)
    {   
        $id = $request -> input('hiddenid');
        DB::delete('delete from kerdoivs where kerdoiv_id = ?',[$id]);
        return redirect('/settings')->with('message','A kérdőív törlése sikeresen megtörtént!');
    }
}
    
    
        
        
        
    
