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


}
    
    
        
        
        
    
