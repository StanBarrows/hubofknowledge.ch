<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Jobs\AssociateQuestionsJob;
use App\Models\Question;
use App\Models\User;
use App\Rules\ExpertsAvailableRule;

class QuestionsController extends Controller
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

        if($this->validateExperts())
        {
            $user = auth()->user();

            $question = Question::create([
                'user_id' =>$user->id,
                'body' => $request->body
            ]);

            AssociateQuestionsJob::dispatch($question);

            //flash('Your associations was successfully submitted!');
        }
        else
        {
            flash('Currently no experts available!');
        }

        return back();
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    protected function validateExperts()
    {
        return User::role('expert')->get()->count() > 0;
    }

}
