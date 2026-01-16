@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card p-3 mb-3">
    <h4>{{ $quiz['title'] }}</h4>
    <p>
        Schedule: {{ $quiz['schedule'] }} <br>
        Duration: {{ $quiz['duration'] }} <br>
        Status: <span class="badge badge-success">{{ $quiz['status'] }}</span>
    </p>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card p-3 text-center">
            <h5>Marks</h5>
            <h3>{{ $result['marks'] }}</h3>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-3 text-center">
            <h5>Percentage</h5>
            <h3>{{ $result['percentage'] }}</h3>
        </div>
    </div>
</div>

<h4 class="mt-4">Your Answers</h4>
@foreach ($questions as $q)
<div class="card p-3 mb-2">
    <strong>Q:</strong> {{ $q['question'] }} <br>
    <strong>Your Answer:</strong> {{ $q['answer'] }}
</div>
@endforeach
@endsection