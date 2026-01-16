<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // ===============================
    // LOGIN
    // ===============================
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    if ($password !== 'password') {
        return back()->withErrors(['password' => 'Wrong password']);
    }

    if (str_ends_with($email, '@teacher.com')) {
        session(['role' => 'teacher']);
        return redirect('/teacher/dashboard');
    }

    if (str_ends_with($email, '@student.com')) {
        session(['role' => 'student']);
        return redirect('/student/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid email domain']);
}


public function logout()
{
    session()->flush();
    return redirect('/login');
}



    // ===============================
    // STUDENT DASHBOARD
    // ===============================
    public function studentDashboard()
    {
        $currentQuiz = [
            'title' => 'Laravel Basics Quiz',
            'schedule' => '14 Jan 2026, 10:00 AM',
            'duration' => '30 minutes',
            'attempts' => '1',
            'status' => 'Incomplete'
        ];

        $upcomingQuizzes = [
            ['title' => 'Database Quiz', 'date' => '20 Jan 2026'],
            ['title' => 'Web Security Quiz', 'date' => '25 Jan 2026']
        ];

        return view('student.dashboard', compact('currentQuiz', 'upcomingQuizzes'));
    }

    public function attemptQuiz()
    {
        $quiz = [
            'title' => 'Laravel Basics Quiz',
            'duration' => '30 minutes'
        ];

        $questions = [
            [
                'id' => 1,
                'question' => 'Laravel is a PHP framework.',
                'options' => ['True', 'False']
            ],
            [
                'id' => 2,
                'question' => 'Which command runs Laravel server?',
                'options' => ['php artisan serve', 'php artisan migrate']
            ]
        ];

        return view('student.attempt-quiz', compact('quiz', 'questions'));
    }

    public function submitQuiz()
    {
        return redirect('/student/quiz/preview')
            ->with('success', 'Quiz submitted successfully!');
    }

    public function quizPreview()
    {
        $quiz = [
            'title' => 'Laravel Basics Quiz',
            'schedule' => '14 Jan 2026, 10:00 AM',
            'duration' => '30 minutes',
            'status' => 'Completed'
        ];

        $result = [
            'marks' => '8 / 10',
            'percentage' => '80%'
        ];

        $questions = [
            [
                'question' => 'Laravel is a PHP framework.',
                'answer' => 'True'
            ],
            [
                'question' => 'Which command runs Laravel server?',
                'answer' => 'php artisan serve'
            ]
        ];

        return view('student.quiz-preview', compact('quiz', 'result', 'questions'));
    }

    // ===============================
    // TEACHER DASHBOARD
    // ===============================
    public function teacherDashboard()
    {
        $subjects = [
            [
                'name' => 'Web Programming',
                'quizzes' => 5,
                'students' => 30,
                'avgScore' => '78%',
                'quizList' => [
                    ['title' => 'Laravel Basics', 'schedule' => '14 Jan 2026', 'status' => 'Active'],
                    ['title' => 'PHP OOP', 'schedule' => '20 Jan 2026', 'status' => 'Open'],
                ]
            ],
            [
                'name' => 'Database Systems',
                'quizzes' => 3,
                'students' => 28,
                'avgScore' => '82%',
                'quizList' => [
                    ['title' => 'SQL Basics', 'schedule' => '15 Jan 2026', 'status' => 'Active']
                ]
            ]
        ];

        return view('teacher.dashboard', compact('subjects'));
    }

    public function teacherCreateQuiz()
    {
        $subjects = ['Web Programming', 'Database Systems', 'Web Security'];
        return view('teacher.create-quiz', compact('subjects'));
    }

    public function teacherStoreQuiz(Request $request)
    {
        return redirect('/teacher/dashboard')->with('success', 'Quiz created successfully!');
    }

    public function teacherManageQuiz($quizId)
    {
        $quiz = [
            'title' => 'Laravel Basics',
            'subject' => 'Web Programming',
            'schedule' => '14 Jan 2026, 10:00 AM',
            'time' => '30 minutes',
            'attempts' => 1,
            'status' => 'Active',
        ];

        $studentResults = [
            ['name' => 'Ali', 'status' => 'Completed', 'score' => '18/20'],
            ['name' => 'Ahmad', 'status' => 'Completed', 'score' => '15/20'],
            ['name' => 'Siti', 'status' => 'Not Taken', 'score' => '--'],
        ];

        $performance = [
            'totalSubmissions' => '20/30',
            'classAvg' => '80%',
            'classDistribution' => [
                '90-100%' => 5,
                '80-89%' => 10,
                '70-79%' => 5,
            ]
        ];

        return view('teacher.manage-quiz', compact('quiz', 'studentResults', 'performance'));
    }
}
