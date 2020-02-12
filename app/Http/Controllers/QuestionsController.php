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

        $questions = $user->questions()->orderBy('created_at','desc')->get();

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
        //https://github.com/yooper/php-text-analysis

        $npl = [];

        $npl['tokens'] = $tokens = tokenize($question->question);
        $npl['normalized_tokens'] = $normalized_tokens = normalize_tokens($tokens);
        $npl['freq_dist'] = $freq_dist = freq_dist($normalized_tokens);

        return view('questions.show', compact('question','npl'));
    }
}
