@extends('layouts.app')

@section('content')
<!-- CURRENT QUIZ BANNER -->
<div class="card bg-info text-white mb-4">
    <div class="card-body">
        <h4>{{ $currentQuiz['title'] }}</h4>
        <p>
            Schedule: {{ $currentQuiz['schedule'] }} <br>
            Duration: {{ $currentQuiz['duration'] }} <br>
            Attempts Allowed: {{ $currentQuiz['attempts'] }} <br>
            Status: {{ $currentQuiz['status'] }}
        </p>

        <!-- Use named route for Attempt Quiz -->
        <a href="{{ route('student.attempt-quiz') }}" class="btn btn-light">
            Attempt Quiz
        </a>
    </div>
</div>

<!-- UPCOMING QUIZZES -->
<h4>Upcoming Quizzes</h4>

<div class="row">
@foreach($upcomingQuizzes as $quiz)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>{{ $quiz['title'] }}</h5>
                <p>Due: {{ $quiz['date'] }}</p>
                
                <!-- Optional: link to preview quiz if needed -->
                <!-- <a href="{{ route('student.quiz-preview') }}" class="btn btn-sm btn-info">Preview</a> -->
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
