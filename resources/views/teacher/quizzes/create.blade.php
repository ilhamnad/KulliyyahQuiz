@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Create Quiz</h3>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/teacher/quizzes') }}">
            @csrf

            <div class="form-group">
                <label>Quiz Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Duration (minutes)</label>
                <input type="number" name="duration" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Save Quiz
            </button>
        </form>

    </div>
</div>
@endsection
