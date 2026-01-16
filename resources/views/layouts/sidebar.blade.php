<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center">
        <span class="brand-text">KulliyyahQuiz</span>
    </a>

    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column">

                @if(session('role') === 'student')
                    <li class="nav-item">
                        <a href="/student/dashboard" class="nav-link {{ request()->is('student/dashboard') ? 'active' : '' }}">
                            <i class="fas fa-user-graduate"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/student/quiz/preview" class="nav-link {{ request()->is('student/quiz/preview') ? 'active' : '' }}">
                            <i class="fas fa-eye"></i> Quiz Preview
                        </a>
                    </li>
                @endif

                @if(session('role') === 'teacher')
                    <li class="nav-item">
                        <a href="/teacher/dashboard" class="nav-link {{ request()->is('teacher/dashboard') ? 'active' : '' }}">
                            <i class="fas fa-chalkboard-teacher"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/teacher/quizzes/create" class="nav-link {{ request()->is('teacher/quizzes/create') ? 'active' : '' }}">
                            <i class="fas fa-plus"></i> Create Quiz
                        </a>
                    </li>
                @endif

                @if(session()->has('role'))
                    <li class="nav-item mt-3">
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="btn btn-danger btn-sm w-100">Logout</button>
                        </form>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
