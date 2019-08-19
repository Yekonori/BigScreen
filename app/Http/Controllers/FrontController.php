<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;

class FrontController extends Controller
{
    public function index() {
        $questions = Questions::all();

        return view('front.index', ['questions' => $questions]);
    }
}
