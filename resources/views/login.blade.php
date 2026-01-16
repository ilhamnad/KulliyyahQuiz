@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background: #f4f6f9;">
    <div class="card shadow-sm p-4" style="width: 420px; border-radius: 12px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold">KulliyyahQuiz</h3>
            <p class="text-muted mb-0">Login as Student or Teacher</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       class="form-control"
                       name="email"
                       placeholder="example@student.com or @teacher.com"
                       required>
                <small class="text-muted">
                    Use <strong>@student.com</strong> or <strong>@teacher.com</strong>
                </small>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password"
                       class="form-control"
                       name="password"
                       placeholder="password"
                       required>
                <small class="text-muted">Demo password: <strong>password</strong></small>
            </div>

            <button class="btn btn-primary w-100 py-2">
                Login
            </button>
        </form>
    </div>
</div>
@endsection
