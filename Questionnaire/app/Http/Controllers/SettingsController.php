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
        
        
        $questionnaire_id = $request->input('questionnaireId');

        $questions = DB::table('kerdeseks')
            ->select('*')
            ->where('kerdoiv_id', '=',  $questionnaire_id)->get();


        foreach($questions as $question)
        {
            var_dump($question);
            $valasz = $request->input('kerdes'.$question->kerdes_id);
            var_dump($valasz);
            $kivalasztott = DB::table('valaszoks')
                    ->select('*')
                    ->where([
                        ['kerdes_id', '=', $question->kerdes_id],
                        ['valasz', '=', $valasz]])
                        ->first();
            var_dump($kivalasztott);
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
        $questions = DB::table('kerdeseks')
        ->select('*')
        ->where('kerdoiv_id', '=', $id)->get();
        return view('pages.edit')->with('questionnaire', $questionnaire)->with('questions',$questions)->with('id',$id);
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
        $questionnaire = DB::table('kerdeseks')
        ->select('*')
        ->where('kerdes_id', '=', $id)->first();
        $questionnaire_id = $question->kerdoiv_id;
        $answers = DB::table('valaszoks')
        ->select('*')
        ->where('kerdes_id', '=', $id)->get();
        return view('pages.update')->with('question', $question)->with('answers',$answers)->with('id',$id)->with('questionnaireId',$questionnaire_id);
    }

    public function updateQuestions(Request $request,$id)
    {   
        public function updateQuestions(Request $request)
    {   
        if(isset($_POST['answerIds']) and isset($_POST['answers'])){
            $answerIdArr = $_POST['answerIds'];
            $answerArr = $_POST['answers'];
            for ($num = 0 ; $num < count($answerArr); $num++) {
                DB::table('valaszoks')->where([
                    ['valaszok_id', '=', $answerIdArr[$num]]])
                    ->update(
                        ['valasz' => $answerArr[$num]]
                );
            }
            return response()->json(['success'=>'Sikeres módosítás!']);
        }
    }
    }
/**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyQuestion(Request $request)
    {   
          if(isset($_POST['questionId']))
        {
            $id = $_POST['questionId'];
            DB::delete('delete from kerdeseks where kerdes_id = ?',[$id]);
        }
        return response()->json(['success'=>'Kérdés sikeresen törölve!']);
    }
    public function destroyQuestionnaire(Request $request)
    {   
        if(isset($_POST['questionnaireId']))
        {
            $id = $_POST['questionnaireId'];
            DB::delete('delete from kerdoivs where kerdoiv_id = ?',[$id]);
        }
        return response()->json(['success'=>'Kérdés sikeresen törölve!']);
    }
    
    public function changeNames(Request $request)
    {
        $id = $request->idToChange;
        $tipus = $request->whatToChange;
        $ujNev = $request->ujNev;
        if($tipus == 'kerdoiv')
        {
            DB::table('kerdoivs')->where('kerdoiv_id', $id)->update(array('kerdoiv_nev' => $ujNev));
            return redirect('/settings/'.$id.'/edit');
        }
        else
        {
            DB::table('kerdeseks')->where('kerdes_id', $id)->update(array('kerdes_szovege' => $ujNev));
            return redirect('/settings/'.$id.'/update');
        }
        
    }
    
     public function getAnswers(){
        if(isset($_GET['kerdesId']))
        {
            $valaszok = DB::table('valaszoks')
                ->select('*')
                ->where('kerdes_id', '=', $_GET['kerdesId'])->get();
            return response()->json(['valaszok'=>$valaszok]);
        }
    }
    public function getQuestionnaires(){
        $kerdoivek = DB::table('kerdoivs')
            ->select('*')->get();
        return response()->json(['kerdoivek'=>$kerdoivek]);
    }
}
    
    
        
        
        
    
