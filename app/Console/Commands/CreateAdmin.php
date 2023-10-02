<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Please provide a valid name');
        $email = $this->ask('Please provide a valid email address');
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error("invalid email...");
            exit(0);
        }

        $password = $this->secret('Please provide a valid password');
        if(strlen($password) < 8) {
            $this->error("password should be at least 8 characters");
            exit(0);
        }

        $password = Hash::make($password);
        $admin = User::create(['name' => $name, 'email' => $email, 'password' => $password]);
        $admin->activate();

        $admin->assignRole(Role::getAdminRole());
        $this->info("Admin has been successfully created!");


        return 1;
    }
}
