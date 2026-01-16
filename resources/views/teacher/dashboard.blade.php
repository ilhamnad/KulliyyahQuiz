@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold">Teacher Dashboard</h3>
        <p class="text-muted mb-0">Web Programming Subject</p>
    </div>

    <!-- STATS CARDS -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="text-muted">Total Quizzes</h6>
                <h3 class="fw-bold">5</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="text-muted">Total Students</h6>
                <h3 class="fw-bold">30</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="text-muted">Average Score</h6>
                <h3 class="fw-bold">78%</h3>
            </div>
        </div>
    </div>

    <!-- QUIZ LIST -->
    <div class="card shadow-sm">
        <div class="card-header fw-bold">
            Created Quizzes
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Quiz Title</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laravel Basics</td>
                        <td>14 Jan 2026</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <a href="{{ route('teacher.manage-quiz', 1) }}" class="btn btn-sm btn-primary">
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>PHP OOP</td>
                        <td>20 Jan 2026</td>
                        <td><span class="badge bg-warning">Open</span></td>
                        <td>
                            <a href="{{ route('teacher.manage-quiz', 1) }}" class="btn btn-sm btn-primary">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
