@extends('layouts.master')

@section('content')
    {{ csrf_field() }}

    <table class="table table-hover table-bordered mt-4 mb-4">
        <tbody>
            @forelse($questions as $question)
            <tr>
                <td>{{ $question->question_number }}</td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->question_type }}</td>
            </tr>
            @empty
            <tr>
                <td colspan=3>Aucune questions...</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection