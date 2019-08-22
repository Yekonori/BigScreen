<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Responses;

class BackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $labels = Questions::availableAnswers('6')->pluck('available_answer');
        $labels = explode(", ", $labels[0]);

        $responses = Responses::all()->where('question_id', '6')->groupBy('response');
        $datas = [];

        foreach ($labels as $key => $value) {
            $number = 0;

            if(isset($responses[$value])) {
                $number = $responses[$value]->count();
            }

            array_push( $datas, $number);
        }
        
        return view('back.index', ['labels' => $labels, 'datas' => $datas ]);
    }

    public function questionnaires() {
        $questions = Questions::all();

        return view('back.questionnaires', ['questions' => $questions]);
    }

    public function reponses() {
        $questions = Questions::all();
        $responses = Responses::all();
        $hash_path = [];

        foreach($responses as $response) {
            $hash_path[$response->hash_path] = Responses::hashPath($response->hash_path)->pluck('response', 'question_id');
        }

        return view('back.reponses', ['responses' => $hash_path, 'questions' => $questions]);

        // return view('back.reponses', ['questions' => $questions, 'responses' => $responses, 'hashs' => $hash_path]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
