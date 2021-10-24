<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers a new user into the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function promptValidAnswer($key, $prompt, $validationRules, $isSecret = false)
    {
        $value = $isSecret ? $this->secret($prompt) : $this->ask($prompt);

        if ($errorMsg = $this->validate($value, $key, $validationRules)) {
            $this->error($errorMsg);
            $this->promptValidAnswer($key, $prompt, $validationRules, $isSecret);
        } else {
            return $value;
        }
    }

    private function validate($value, $key, $rules)
    {
        $validator = validator([$key => $value], $rules);

        if ($validator->fails()) {
            return $validator->errors()->first($key);
        } else {
            return null;
        }
    }

    private function confirmPasswordValidation($password)
    {
        $confirmPassword = $this->secret("Please confirm the user password (type it again)");

        if ($password !== $confirmPassword) {
            $this->error("passwords do not match");
            $this->confirmPasswordValidation($password);
        } else {
            return $confirmPassword;
        }
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Welcome to the registration process. Please enter the user informtation as prompted. You can safely exit this process by pressing CTRL+C");
        $name = $this->promptValidAnswer('name', 'Enter the user name', ['name' => 'bail|required|min:3']);
        $email = $this->promptValidAnswer('email', 'Enter the user email', ['email' => 'bail|required|email|unique:users,email']);
        $password = $this->promptValidAnswer('password', 'Enter the user password', ['password' => 'bail|required|min:8'], true);
        $this->confirmPasswordValidation($password);

        // $isAdmin = $this->confirm('Should the user have admin privileges', true);


        // Log::channel("stderr")->debug($name);
        // Log::channel("stderr")->debug($email);
        // Log::channel("stderr")->debug($password !== $confirmPassword);
        // Log::channel("stderr")->debug($isAdmin);

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);

        $user->save();

        $this->info("User successfully created");
        return 0;
    }
}
