@extends('layouts.master')

@section('content')

    <div class="row mt-4">        
        @forelse($questions as $question)
        <div class="col-md-12 mb-4">
            <h1>{{ $question->question }}</h1>
            @forelse($responses as $key => $value)
            @if($question->id == $key)
            <div class="col-md-12">
                <p>{{ $value }}</p>
            </div>
            @endif
            @empty
            <p>Aucune réponses...</p>

            @endforelse
        </div>
        @empty
        <p>Aucune réponses...</p>

        @endforelse
    </div>

@endsection