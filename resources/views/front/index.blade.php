@extends('layouts.master')

@section('content')

    <h1>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {!! session()->get('success') !!}
    </div>
    @endif

    <form action="{{ route('responses.store') }}" method="POST">
        {{ csrf_field() }}
        
        @forelse($questions as $question)
        <div class="form-group">
            <p class="question-number">Question {{ $question->id }} / {{ count($questions) }}</p>
            <p class="question-sentence">{{ $question->question }}</p>
            <div>
                @if( $question->question_type === "B" )
                <input type="text" name="answer{{ $question->question_type }}[{{ $question->id }}]" id="answer{{ $question->id }}" class="form-control">
                @else
                    <select name="answer{{ $question->question_type }}[{{ $question->id }}]" id="answer{{$question->id}}" class="form-control">
                        <!-- <option value="">--- Choissisez une valeur ---</option> -->
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

        <button type="submit" class="btn btn-primary">Finaliser</button>
    </form>

@endsection