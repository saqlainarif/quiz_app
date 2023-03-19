{!! Form::open(['id'=>'QForm','class'=>'form-question', 'method' => 'post']) !!}
<h5 class="mb-3 font-weight-normal">{{$model->question_text}}</h5>

<div class="form-control">

    <input type="radio" value="option_1" class="radio" id="answer" name="answer" required> {{$model->option_1}}
    <br>

    <input type="radio" value="option_2" class="radio" id="answer" name="answer" required> {{$model->option_2}}
    <br>

    <input type="radio" value="option_3" class="radio" id="answer" name="answer" required> {{$model->option_3}}
    <br>

    <input type="radio" value="option_4" class="radio" id="answer" name="answer" required> {{$model->option_4}}
    <br>
    <label id="answer-error" class="errorTxt text-danger" for="answer"></label>
</div>
<br>
<div class="text-center">
    <button class="btn btn-lg btn-info" onclick="skipQuestion({{$model->id}},{{$result_id}});" type="button">Skip</button>
    <button class="btn btn-lg btn-primary" onclick="SaveAnswer({{$model->id}},{{$result_id}});" type="button">Next</button>
</div>
{!! Form::close() !!}

