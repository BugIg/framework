<?php

namespace AvoRed\Framework\System\Console;

use Illuminate\Console\Command;
use AvoRed\Framework\User\Models\AdminUser;

class AdminMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'avored:admin:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Admin User for  AvoRed e commerce';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $data['first_name'] = $this->ask('What is your First Name?');
        $data['last_name'] = $this->ask('What is your last Name?');
        $data['email'] = $this->ask('What is your Email Address?');
        $data['password'] = $this->secret('What is your Password?');
        $data['confirm_password'] = $this->secret('Confirm your password again?');

//        $role = $this->roleRepository->findAdminRole();
//        $data['role_id'] = $role->id;
//        $data['is_super_admin'] = 1;
        $data['password'] = bcrypt($data['password']);
        AdminUser::create($data);

        $this->info('Admin User created Successfully!');
    }
}