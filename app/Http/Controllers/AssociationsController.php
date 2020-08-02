<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptAssociationRequest;
use App\Http\Requests\DeclineAssociationRequest;
use App\Models\Association;
use App\Models\Question;

class AssociationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth','role:expert']);
    }

    public function index()
    {
        $user = auth()->user();

        $associations = $user->associations()->orderBy('created_at','desc')->get();

        return view('associations.index', compact('associations'));
    }

    public function accept(AcceptAssociationRequest $request)
    {
        $association = Association::where('uuid', $request->association)->first();

        $association->setStatus(Association::STATUS_ACCEPTED);
        $association->question->setStatus(Question::STATUS_OPEN);

        return back();
    }


    public function decline(DeclineAssociationRequest $request)
    {
        $association = Association::where('uuid', $request->association)->first();
        $association->setStatus(Association::STATUS_DECLINED);
        $association->delete();

        return back();
    }

    public function show(Association $association)
    {
        if($association->status === Association::STATUS_ACCEPTED)
        {
            $question = $association->question;

            return view('associations.show', compact('association','question'));

        }
        else
        {
            return back();
        }
    }
}
