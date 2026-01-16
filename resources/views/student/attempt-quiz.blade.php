@extends('layouts.app')

@section('content')
<h3>{{ $quiz['title'] }}</h3>
<p>Duration: {{ $quiz['duration'] }}</p>

<form method="POST" action="/student/quiz/submit">
    @csrf

    @foreach ($questions as $q)
<div class="card p-3 mb-2">
    <b>{{ $q['question'] }}</b>

    @foreach ($q['options'] as $opt)
    <div class="form-check">
        <input type="radio" name="q{{ $q['id'] }}" class="form-check-input">
        <label>{{ $opt }}</label>
    </div>
    @endforeach
</div>
@endforeach

    <button type="submit" class="btn btn-success">
        Submit Quiz
    </button>
</form>
@endsection
