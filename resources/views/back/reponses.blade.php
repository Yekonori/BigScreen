@extends('layouts.master')

@section('content')

    @forelse($responses as $response)
    <table class="table table-hover table-bordered mt-4 mb-4">
        <tbody>
            @forelse($questions as $question)
            <tr>
                <td>{{ $question->question_number }}</td>
                <td>{{ $question->question }}</td>
                @forelse($response as $key => $value)
                @if($question->id == $key)
                <td>{{ $value }}</td>
                @endif
                @empty
                @endforelse
            </tr>
            @empty
            <tr>Aucune réponse...</tr>
            @endforelse
        </tbody>
    </table>
    @empty
    <p>Non...</p>
    @endforelse

@endsection