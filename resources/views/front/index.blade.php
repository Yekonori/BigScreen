@extends('layouts.master')

@section('content')

    <h1>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</h1>

    <form action="" method="POST">
        
        @forelse($questions as $question)
        <div class="form-group">
            <p class="question-number">Question {{ $question->id }} / {{ count($questions) }}</p>
            <p class="question-sentence">{{ $question->question }}</p>
            <div>
                @if( $question->question_type === "B" )
                <input type="text" name="text{{ $question->id }}" id="text{{ $question->id }}" class="form-control" require>
                @else
                    <select name="select{{$question->id}}" id="select{{$question->id}}" class="form-control">
                        <option value="">--- Choissisez une valeur ---</option>
                        @forelse(explode(', ', $question->available_answer) as $response)
                        <option value="{{ $response }}">{{ $response }}</option>
                        @empty
                        @endforelse
                    </select>
                @endif
            </div>
        </div>

        @empty
        <p>Aucune question...</p>

        @endforelse
    </form>

@endsection