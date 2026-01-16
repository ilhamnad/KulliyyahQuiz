<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

// Home
Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [QuizController::class, 'showLoginForm'])->name('login');
Route::post('/login', [QuizController::class, 'login']);
Route::post('/logout', [QuizController::class, 'logout'])->name('logout');

// Student
Route::get('/student/dashboard', [QuizController::class, 'studentDashboard'])->name('student.dashboard');
Route::get('/student/quiz/attempt', [QuizController::class, 'attemptQuiz'])->name('student.attempt-quiz');
Route::post('/student/quiz/submit', [QuizController::class, 'submitQuiz'])->name('student.submit-quiz');
Route::get('/student/quiz/preview', [QuizController::class, 'quizPreview'])->name('student.quiz-preview');

// Teacher
Route::get('/teacher/dashboard', [QuizController::class, 'teacherDashboard'])->name('teacher.dashboard');
Route::get('/teacher/quizzes/create', [QuizController::class, 'teacherCreateQuiz'])->name('teacher.create-quiz');
Route::post('/teacher/quizzes/create', [QuizController::class, 'teacherStoreQuiz'])->name('teacher.store-quiz');
Route::get('/teacher/quizzes/manage/{quizId}', [QuizController::class, 'teacherManageQuiz'])->name('teacher.manage-quiz');
