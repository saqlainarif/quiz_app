<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd(session()->all());
        if (!session('user_id')) {
            redirect()->route('home')->send();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = Result::where('user_id', session::get('user_id'))->where('status', 0)->first();
        if ($result) {
            $model = Question::inRandomOrder()->whereNotIn('id', $this->getSolved($result->id))->first();
        } else {
            $result = Result::create([
                'user_id' => session::get('user_id'),
                'total_questions' => Question::get()->count(),
                'correct_answers' => 0,
                'incorrect_answers' => 0,
                'skipped_answers' => 0,
                'score' => 0,
                'status' => 0
            ]);
            $model = Question::inRandomOrder()->first();
        }

        if (!$model) {
            return redirect()->route('quiz.compile_result', $result->id);
        }
        //dd($result);
        return view("question", compact('model', 'result'));
    }

    public function skip_question(Request $request)
    {
        $question_id = $request->question_id;
        $result_id = $request->result_id;
        $skipped = UserAnswer::where('result_id', $result_id)->where('selected_answer', 'skipped')->get()->count();
        if ($skipped < 11) {
            UserAnswer::create([
                'user_id' => session::get('user_id'),
                'result_id' => $result_id,
                'question_id' => $question_id,
                'selected_answer' => 'skipped'
            ]);
            return response()
                ->json([
                    'data' => ['status' => 1, 'message' => 'skipped']
                ]);
        } else {
            return response()
                ->json([
                    'data' => ['status' => 0, 'message' => 'not-skipped']
                ]);
        }
    }

    public function save_answer(Request $request)
    {
        $this->validate($request, [
            'question_id' => 'required|integer',
            'result_id' => 'required|integer',
            'user_selection' => 'required|string'
        ]);
        $question_id = $request->question_id;
        $result_id = $request->result_id;
        $user_selection = $request->user_selection;
        UserAnswer::create([
            'user_id' => session::get('user_id'),
            'result_id' => $result_id,
            'question_id' => $question_id,
            'selected_answer' => $user_selection
        ]);
        return response()
            ->json([
                'data' => ['status' => 1, 'message' => 'answered']
            ]);
    }

    public function getnext(Request $request)
    {
        $result_id = $request->result_id;
        $output = $this->getSolved($result_id);
        $model = Question::inRandomOrder()->whereNotIn('id', $output)->first();
        if (request()->ajax()) {
            if (isset($model)) {
                return response()
                    ->json([
                        'data' => ['status' => 1, 'html' => view('partial/_question', compact('model', 'result_id'))->render()]
                    ]);
            } else {
                return response()
                    ->json([
                        'data' => ['status' => 0, 'html' => '<div>no data</div>']
                    ]);
            }
        }

    }

    public function compile_result($result_id)
    {

        $total = count($this->getSolved($result_id));
        $db_total = Question::get()->count();
        if ($total != $db_total) {
            return redirect()->route('quiz.result')->with('error', 'Error while processing');
        }
        $answers = UserAnswer::where('result_id', $result_id)->get();
        $correct = 0;
        $skipped = 0;
        $wrong = 0;
        foreach ($answers as $answer) {
            $question = Question::where('id', $answer->question_id)->first();
            if ($question->correct_answer == $answer->selected_answer) {
                $correct++;
            } else if ($answer->selected_answer == 'skipped') {
                $skipped++;
            } else {
                $wrong++;
            }
        }

        //calculate score
        $score = 0;
        $score = $correct / $total * 100;
        //setting up final results
        $result_model = Result::where('id', $result_id)->first();
        $result_model->correct_answers = $correct;
        $result_model->incorrect_answers = $wrong;
        $result_model->skipped_answers = $skipped;
        $result_model->score = $score;
        $result_model->status = 1;
        $result_model->save();

        return redirect()->route('quiz.result');
    }

    public function result()
    {
        $models = Result::where('user_id', session::get('user_id'))->get();
        return view('user_results', compact('models'));
    }
    public function single_result ($id)
    {
        $model = Result::where('id',$id)->first();
        return view('result', compact('model'));
    }

    public function logout()
    {
        session::forget('user_id');
        session::forget('user_name');
        return redirect()->route('home');
    }

    private function getSolved($result_id)
    {
        return UserAnswer::where('result_id', $result_id)->pluck('question_id')->toArray();
    }

}
