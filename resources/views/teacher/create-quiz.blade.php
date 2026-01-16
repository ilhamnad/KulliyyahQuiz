@extends('layouts.app')

@section('content')
<h1>Create Quiz</h1>

<form action="{{ route('teacher.store-quiz') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Quiz Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label>Subject</label>
        <select name="subject" class="form-control">
            @foreach($subjects as $subject)
                <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Time Limit (minutes)</label>
        <input type="number" name="duration" class="form-control">
    </div>

    <div class="form-group">
        <label>Attempt Limit</label>
        <input type="number" name="attempts" class="form-control">
    </div>

    <!-- DATEPICKER -->
    <div class="form-group">
        <label>Schedule</label>
        <input type="datetime-local" name="schedule" class="form-control">
    </div>

    <div class="form-group">
        <label>Question Order</label>
        <select name="order" class="form-control">
            <option value="shuffle">Shuffle</option>
            <option value="fixed">Fixed</option>
        </select>
    </div>

    <hr>
    <h4>Questions</h4>

    <div id="question-wrapper">
        <div class="question-block border p-3 mb-3">

            <label>Question</label>
            <input type="text" name="questions[0][text]" class="form-control mb-2">

            <label>Question Type</label>
            <select name="questions[0][type]" class="form-control mb-2 type-select">
                <option value="mcq">Multiple Choice</option>
                <option value="tf">True / False</option>
            </select>

            <div class="mcq-options">
                <label>Options</label>
                <select name="questions[0][answer]" class="form-control mb-2">
                    <option value="Option 1">Option 1</option>
                    <option value="Option 2">Option 2</option>
                    <option value="Option 3">Option 3</option>
                    <option value="Option 4">Option 4</option>
                </select>
            </div>

            <div class="tf-options d-none">
                <label>Correct Answer</label>
                <select name="questions[0][answer_tf]" class="form-control mb-2">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>

            <label>Points</label>
            <input type="number" name="questions[0][points]" class="form-control" value="1">
        </div>
    </div>

    <button type="button" id="add-question-btn" class="btn btn-secondary mb-3">
        + Add Question
    </button>

    <button type="submit" class="btn btn-success">Create Quiz</button>
</form>

<script>
let questionIndex = 1;

// Add new question block
document.getElementById('add-question-btn').addEventListener('click', function () {
    let wrapper = document.getElementById('question-wrapper');

    let block = `
    <div class="question-block border p-3 mb-3">
        <label>Question</label>
        <input type="text" name="questions[${questionIndex}][text]" class="form-control mb-2">

        <label>Question Type</label>
        <select name="questions[${questionIndex}][type]" class="form-control mb-2 type-select">
            <option value="mcq">Multiple Choice</option>
            <option value="tf">True / False</option>
        </select>

        <div class="mcq-options">
            <label>Options</label>
            <select name="questions[${questionIndex}][answer]" class="form-control mb-2">
                <option value="Option 1">Option 1</option>
                <option value="Option 2">Option 2</option>
                <option value="Option 3">Option 3</option>
                <option value="Option 4">Option 4</option>
            </select>
        </div>

        <div class="tf-options d-none">
            <label>Correct Answer</label>
            <select name="questions[${questionIndex}][answer_tf]" class="form-control mb-2">
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>

        <label>Points</label>
        <input type="number" name="questions[${questionIndex}][points]" class="form-control" value="1">

        <button type="button" class="btn btn-danger btn-sm mt-2 remove-question">Remove</button>
    </div>`;

    wrapper.insertAdjacentHTML('beforeend', block);
    questionIndex++;

    applyTypeSwitching();
    applyRemoveButtons();
});

// Toggle MCQ vs True/False
function applyTypeSwitching() {
    document.querySelectorAll('.type-select').forEach(select => {
        select.onchange = function() {
            let parent = this.closest('.question-block');
            let mcq = parent.querySelector('.mcq-options');
            let tf = parent.querySelector('.tf-options');
            if (this.value === 'mcq') {
                mcq.classList.remove('d-none');
                tf.classList.add('d-none');
            } else {
                mcq.classList.add('d-none');
                tf.classList.remove('d-none');
            }
        };
    });
}

// Remove block
function applyRemoveButtons() {
    document.querySelectorAll('.remove-question').forEach(btn => {
        btn.onclick = () => btn.parentElement.remove();
    });
}

// Initialize first block switching
applyTypeSwitching();
</script>
@endsection
