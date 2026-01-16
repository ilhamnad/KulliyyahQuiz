@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- QUIZ INFO BANNER -->
<div class="card bg-secondary text-white mb-4">
    <div class="card-body">
        <h4>{{ $quiz['title'] }}</h4>
        <p>
            Schedule: {{ $quiz['schedule'] }} <br>
            Duration: {{ $quiz['duration'] }} <br>
            Status: {{ $quiz['status'] }}
        </p>
    </div>
</div>

<!-- RESULT CARDS -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5>Marks</h5>
                <h3>{{ $result['marks'] }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5>Grade (%)</h5>
                <h3>{{ $result['percentage'] }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- ANSWER REVIEW -->
<h4>Answered Questions</h4>

@foreach($questions as $q)
    <div class="card mb-2">
        <div class="card-body">
            <p><strong>{{ $q['question'] }}</strong></p>
            <p>Your Answer: {{ $q['answer'] }}</p>
        </div>
    </div>
@endforeach

@endsection
