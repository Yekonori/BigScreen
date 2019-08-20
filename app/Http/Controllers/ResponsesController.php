<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Response;

class ResponsesController extends Controller
{
    public function store(Request $request) {

        $hash_path = Str::uuid()->toString();

        $this->validate($request, [
            'answerA.*' => 'required',
            'answerB.*' => 'required|min:1|max:255',
            'answerC.*' => 'required|regex:/[1-5]/'
        ]);

        $responses = array_replace( $request->answerA, $request->answerB, $request->answerC );
        ksort($responses);

        foreach ($responses as $key => $value) {
            Response::create([
                'question_id'   => $key,
                'response'      => $value,
                'hash_path'     => $hash_path
            ]);
        }

        return redirect('/')->with(
            'message', 
            'Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
            votre investissement, nous vous préparons une application toujours plus
            facile à utiliser, seul ou en famille.
            Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
            cette adresse: http://xxxxxxxx'
        );
    }
}
