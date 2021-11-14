<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerdoiv;
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
        //dd($questions);

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
            'question' => 'required',
            'ans0' => 'required',
            'ans1' => 'required'
        ]);

        $question = Questions::create([
            'question' => $request ->input('question'),
            'ans0' => $request -> input('ans0'),
            'ans1' => $request -> input('ans1'),
            'ans2' => $request -> input('ans2'),
            'ans3' => $request -> input('ans3'),
        ]);

        return redirect('/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
    //     $question = Questions::find($id);
    //     dd($question);
    //     return view('pages.edit')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.edit')->with('question',Questions::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'ans0' => 'required',
            'ans1' => 'required',
            'correct' => 'required|integer',
            'ans2' => 'nullable', //javításra szorul, nem adódik hozzá, ha két opciónk van.
            'ans3' => 'required_with:ans2'
        ]);

        Questions::where('id',$id)->update([
            'question' => $request ->input('question'),
            'ans0' => $request -> input('ans0'),
            'ans1' => $request -> input('ans1'),
            'ans2' => $request -> input('ans2'),
            'ans3' => $request -> input('ans3'),
            'correct' => $request -> input('correct')
        ]);

        return redirect('/settings')->with('message','Sikeres szerkesztés!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $id = $request -> input('id');
        DB::delete('delete from questions where id = ?',[$id]);
        return redirect('/settings')->with('message','Sikeres törlés!');
    }
}
