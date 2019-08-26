<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Responses;

class ResponsesController extends Controller
{
    public function store(Request $request) {

        /**
         * Create a unique user id to obtain the `hash_path` value
         */
        $hash_path = Str::uuid()->toString();

        /**
         * Validator of all questions : 
         *  - Email questions => need to be an email
         *  - Type B questions => need to be a string with a number of characters min 1 and max 255
         *  - Type C questions => need to be 1, 2, 3, 4 or 5
         */
        $this->validate($request, [
            'email.*'     => 'required|email',
            'answerA.*' => 'required',
            'answerB.*' => 'required|min:1|max:255',
            'answerC.*' => 'required|regex:/[1-5]/'
        ]);

        /**
         * Store all of the answers inside an array ($responses)
         * Sort this array by the key value ; here the key value is the id of the question
         */
        $responses = array_replace( $request->email, $request->answerA, $request->answerB, $request->answerC );
        ksort($responses);

        /**
         * Foreach value inside $responses : 
         *  - Create a responses with the good association of key/value
         */
        foreach ($responses as $key => $value) {
            Responses::create([
                'question_id'   => $key,
                'response'      => $value,
                'hash_path'     => $hash_path
            ]);
        }

        /**
         * Redirect to the `/` route page
         * 
         * Generate a success message with the link to the answers
         */
        return redirect('/')->with(
            "success", 
            "Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
            votre investissement, nous vous préparons une application toujours plus
            facile à utiliser, seul ou en famille. <br>
            Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
            cette adresse: <br> <a href='".url("/$hash_path")."'/>" . url("/$hash_path") . " </a>"
        );
    }
}
