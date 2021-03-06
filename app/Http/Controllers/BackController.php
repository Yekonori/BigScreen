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
        $pieDatas = array($this->pieChart('6'), $this->pieChart('7'), $this->pieChart('10'));

        $radarDatas = $this->radarChart(array('11', '12', '13', '14', '15'));
        
        return view('back.index', ['pieDatas' => $pieDatas, 'radarDatas' => $radarDatas]);
    }

    /**
     * @Parameters : 
     *  - $questionID => a string to get a question by her id
     * 
     * @Return :
     *  - Array : 
     *      - "question_id"
     *      - "question"
     *      - "labels"
     *      - "datas"
     *      - "colors"
     */
    public function pieChart(string $questionID) {
        /**
         * Get all the available answers to display them in the labels' Pie Chart
         */
        $labels = Questions::availableAnswers($questionID)->pluck('available_answer');
        $labels = explode(", ", $labels[0]);

        /**
         * Get the question
         */
        $question = Questions::where('id', $questionID)->pluck('question');

        /**
         * Group all the responses to count them after
         */
        $responses = Responses::all()->where('question_id', $questionID)->groupBy('response');
        $datas = [];

        $colors = [];

        /**
         * Foreach labels define : 
         *  - $number => how many this response was choose
         *  - $colors => push a value who define the label
         */
        foreach ($labels as $key => $value) {
            $number = 0;

            if(isset($responses[$value])) {
                $number = $responses[$value]->count();
            }

            array_push( $datas, $number );
            array_push( $colors, "#".bin2hex(openssl_random_pseudo_bytes(3)) );
        }

        return array(
            "question_id" => $questionID, 
            "question" => $question[0], 
            "labels" => $labels, 
            "datas" => $datas, 
            "colors" => $colors
        );
    }

    /**
     * @Parameters : 
     *  - $questionsID => a array to get a group of questions by her id
     * 
     * @Return :
     *  - Array : 
     *      - "labels"
     *      - "datas"
     */
    public function radarChart(array $questionsID) {

        $labels = [];
        $responses = [];

        /**
         * Foreach value inside $questionsID : 
         *  - $labels => push inside the sentence `Question n°` + the value of `$questionID`
         *  - $responses => push inside a average of the answers 
         */
        foreach ($questionsID as $questionID) {
            array_push($labels, "Question n°" . $questionID);
            array_push($responses, Responses::all()->where('question_id', $questionID)->avg('response'));
        }

        return array("labels" => $labels, "datas" => $responses);
    }

    /**
     * Get all questions
     */
    public function questionnaires() {
        $questions = Questions::all();

        return view('back.questionnaires', ['questions' => $questions]);
    }

    /**
     * Get all responses
     */
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
