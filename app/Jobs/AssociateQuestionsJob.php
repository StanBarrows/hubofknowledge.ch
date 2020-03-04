<?php

namespace App\Jobs;

use App\Models\Association;
use App\Models\Question;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AssociateQuestionsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $question;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
        $expert = $this->getExpert();

        $association = Association::create([
            'user_id' => $expert->id,
            'question_id' => $this->question->id
        ]);

        try {

        }
        catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
        }


    }

    protected function getExpert()
    {
       /* return User::role('expert')->where('id','not like',$this->question->user_id)->whereHas('associations', function (Builder $query) {
            $query->where('question_id', 'not like', $this->question->id);
        })->get()->random();*/

        return User::role('expert')->where('id','not like',$this->question->user_id)->get()->random();
    }
}
