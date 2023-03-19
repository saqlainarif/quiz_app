@extends('layouts.common',['title' => 'User Results'])
@section('content')
    <div id="questionDiv" class="w-100">
        <div class="form-question">
            <h5 class="mb-3 font-weight-normal text-center">User Result</h5>

            <div class="form-control">
                <div class="font-bold">Total Questions: {{$model->total_questions}}</div>
                <div>Correct Questions: {{$model->correct_answers}}</div>
                <div>Incorrect Questions: {{$model->incorrect_answers}}</div>
                <div>Skipped Questions: {{$model->skipped_answers}}</div>
                <div>Score : {{$model->score}}</div>
            </div>
            <div class="text-center mt-2">
                <a class="btn btn-lg btn-info" href="{{ route('quiz.result') }}">Back</a>
                <a class="btn btn-lg btn-primary"  href="{{ route('quiz.index') }}">Start New</a>
            </div>
        </div>
    </div>
@endsection

