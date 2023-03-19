@extends('layouts.common',['title' => 'User Results'])
@section('content')
    <div id="questionDiv" class="w-100">
        <div class="form-question">
            <h5 class="mb-3 font-weight-normal text-center">User Result</h5>

            <div class="form-control">
                @include('alerts')
                <table class="table datatable table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Total Questions</th>
                        <th>Correct Questions</th>
                        <th>Incorrect Questions</th>
                        <th>Skipped Questions</th>
                        <th>Score</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->total_questions}}</td>
                            <td>{{$model->correct_answers}}</td>
                            <td>{{$model->incorrect_answers}}</td>
                            <td>{{$model->skipped_answers}}</td>
                            <td>{{$model->score}}</td>
                            <td> @if($model->status ==0)
                                    <span class="badge badge-primary">Pending</span>
                                @elseif($model->status==1)
                                    <span class="badge badge-success">Completed</span>
                                @endif</td>
                            <td>
                                @if($model->status ==0)
                                    <a href="{{route('quiz.index')}}" class="btn btn-sm btn-info">Finish</a>
                                @elseif($model->status==1)
                                    <a href="{{route('quiz.view_result',$model->id)}}" class="btn btn-sm btn-success">View
                                        Result</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-2">
                <a class="btn btn-lg btn-info" href="{{ route('quiz.logout') }}">Logout</a>
                <a class="btn btn-lg btn-primary" href="{{ route('quiz.index') }}">Start New Quiz</a>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .form-question {

            max-width: 900px;
            padding: 25px;
            margin: 0 auto;
            background-color: cornflowerblue;
            border-radius: 10px;
        }

    </style>
@endsection

