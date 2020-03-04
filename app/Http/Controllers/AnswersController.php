<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Models\Answer;
use App\Models\Question;

class AnswersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function create(CreateQuestionRequest $request)
    {
        $question = Question::where('uuid', $request->question)->first();

        $answer = Answer::create([
            'user_id' => auth()->user()->id,
           'question_id' => $question->id,
            'body' => $request->body
        ]);

        flash('Your answer was successfully submitted!');

        return back();
    }


}
