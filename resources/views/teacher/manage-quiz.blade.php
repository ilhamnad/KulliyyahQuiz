@extends('layouts.app')

@section('content')
<h1>{{ $quiz['title'] }} - Manage Quiz</h1>
<p>Subject: {{ $quiz['subject'] }}</p>
<p>Schedule: {{ $quiz['schedule'] }}</p>
<p>Time: {{ $quiz['time'] }}</p>
<p>Attempts: {{ $quiz['attempts'] }}</p>
<p>Status: {{ $quiz['status'] }}</p>

<div class="mb-3">
    <button class="btn btn-warning">Edit</button>
    <button class="btn btn-danger">Delete</button>
</div>

<h4>Performance</h4>
<div class="row">
    <div class="col-md-4">
        <div class="card p-3 mb-2">Total Submissions: {{ $performance['totalSubmissions'] }}</div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 mb-2">Class Average: {{ $performance['classAvg'] }}</div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 mb-2">Distribution:
            @foreach($performance['classDistribution'] as $range => $count)
                <br>{{ $range }}: {{ $count }}
            @endforeach
        </div>
    </div>
</div>

<h4>Student Results</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Student</th>
            <th>Status</th>
            <th>Score</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($studentResults as $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['status'] }}</td>
            <td>{{ $student['score'] }}</td>
            <td><button class="btn btn-info btn-sm">View</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
