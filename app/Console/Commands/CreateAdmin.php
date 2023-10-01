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
        $password = Hash::make($this->ask('Please provide a valid password'));

        $admin = User::create(['name' => $name, 'email' => $email, 'password' => $password]);
        $admin->activate();

        $admin->assignRole(Role::getAdminRole());
        $this->info("Admin has been successfully created!");


        return 1;
    }
}
