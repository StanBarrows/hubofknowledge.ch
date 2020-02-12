<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;

class QuestionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $questions = $user->questions;

        return view('questions.index', compact('questions'));
    }

    public function ask(AskQuestionRequest $askQuestionRequest)
    {
        $user = auth()->user();

        $question = Question::create([
            'user_id' =>$user->id,
            'question' => $askQuestionRequest->question
        ]);

        flash('Your questions was successfully submitted!');

        return back();
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }
}
