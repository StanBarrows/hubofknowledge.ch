<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User create';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {

            $name = $this->askValid(
                'What\'s his/her name?',
                'name',
                ['required','string','min:4','max:255']
            );

            $email = $this->askValid(
                'What\'s his/her e-mail?',
                'email',
                ['required', 'string', 'email','max:255', 'unique:users']
            );

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt(Str::random(16))
            ]);

            $this->info("$user->name has successfully been created!");

        } catch (\Exception $exception) {

            Log::error($exception->getMessage());

            $this->info("Something went wrong!");
        }
    }

    protected function askValid($question, $field, $rules)
    {
        $value = $this->ask($question);

        if ($message = $this->validateInput($rules, $field, $value)) {
            $this->error($message);

            return $this->askValid($question, $field, $rules);
        }

        return $value;
    }

    protected function validateInput($rules, $fieldName, $value)
    {
        $validator = Validator::make([
            $fieldName => $value
        ], [
            $fieldName => $rules
        ]);

        return $validator->fails()
            ? $validator->errors()->first($fieldName)
            : null;
    }
}
