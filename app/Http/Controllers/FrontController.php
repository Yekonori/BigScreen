<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Responses;

class FrontController extends Controller
{
    /**
     * Get all questions
     */
    public function index() {
        $questions = Questions::all();

        return view('front.index', ['questions' => $questions]);
    }

    /**
     * Get all the responses were `hash_path` is equal to the parameter $hashPath
     */
    public function answers(string $hashPath) {
        $questions = Questions::all();
        $responses = Responses::hashPath($hashPath)->pluck('response', 'question_id');

        return view('front.answers', ['questions' => $questions, 'responses' => $responses]);
    }
}
