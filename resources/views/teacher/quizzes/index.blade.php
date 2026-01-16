@extends('layouts.app')

@section('content')
<h2>Manage Quizzes</h2>

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Subject</th>
        <th>Status</th>
    </tr>

    @foreach($quizzes as $quiz)
    <tr>
        <td>{{ $quiz['title'] }}</td>
        <td>{{ $quiz['subject'] }}</td>
        <td>{{ $quiz['status'] }}</td>
    </tr>
    @endforeach
</table>
@endsection
