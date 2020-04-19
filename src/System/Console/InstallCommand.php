<?php

namespace AvoRed\Framework\System\Console;

use AvoRed\Framework\User\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class InstallCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'avored:install
        {--fresh : Use migrate fresh command while installing. Only works in local env}'
    ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install AvoRed e commerce an Laravel Shopping Cart';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $env = App::environment();
        if ($this->option('fresh') && $env === 'local') {
            $this->call('migrate:fresh');
        } else {
            $this->call('migrate');
        }

        $this->call('storage:link');
//        if ($this->confirm('Would you like to install Dummy Data?')) {
//            $this->call('avored:module:install', ['identifier' => 'avored-demodata']);
//        }
        $roleData = ['name' => Role::ADMIN];
        Role::create($roleData);
//        $this->createCurrency();
//        $this->createLanguage();
//        $this->createDefaultUserGroup();
//        $this->createOrderStatus();
//        $this->alterUserTable();
//
        $this->call('avored:admin:make');
        $this->info('AvoRed Install Successfully!');
    }

    /**
     * Get the Default currency data.
     * @return void
     */
    public function createCurrency()
    {
        $data = [
            'name' => 'US Dollar',
            'code' => 'usd',
            'symbol' => '$',
            'conversation_rate' => 1,
            'status' => 'ENABLED',
        ];
        $this->currencyRepository->create($data);
    }

    /**
     * Get the Default currency data.
     * @return void
     */
    public function createDefaultUserGroup()
    {
        $data = [
            'name' => 'Default Group',
            'is_default' => 1,
        ];
        $this->userGroupRepository->create($data);
    }

    /**
     * create order status.
     * @return void
     */
    public function createOrderStatus()
    {
        $defaultStatus = $this->orderStatusRepository->create(['name' => 'Pending']);
        $defaultStatus->is_default = 1;
        $defaultStatus->save();
        $this->orderStatusRepository->create(['name' => 'Processing']);
        $this->orderStatusRepository->create(['name' => 'Completed']);
    }

    /**
     * Get the Language data.
     * @return void
     */
    public function createLanguage()
    {
        $data = [
            'name' => 'English',
            'code' => 'en',
            'is_default' => 1,
        ];
        $this->languageRepository->create($data);
    }

    /**
     * Alter User Table for user group id.
     * @return void
     */
    public function alterUserTable()
    {
        $user = config('avored.model.user');
        try {
            $model = resolve($user);
        } catch (\Exception $e) {
            $model = null;
        }

        if ($model !== null) {
            $table = $model->getTable();
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $table) {
                    $table->unsignedBigInteger('user_group_id')->nullable()->default(null);
                });
            }
        }
    }
}
