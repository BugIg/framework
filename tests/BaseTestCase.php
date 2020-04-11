<?php
namespace AvoRed\Framework\Tests;

use AvoRed\Framework\Database\Models\Role;
use AvoRed\Framework\Database\Models\AdminUser;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Support\Facades\Notification;
use AvoRed\Framework\AvoRedProvider;
use Rebing\GraphQL\GraphQLServiceProvider;

abstract class BaseTestCase extends OrchestraTestCase
{
    /**
     * Admin User
     * @var \AvoRed\Framework\Database\Models\AdminUser $user
     */
    protected $user;

    /**
     * Setup Config and other data for unit test
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->app['config']->set('app.key', 'base64:UTyp33UhGolgzCK5CJmT+hNHcA+dJyp3+oINtX+VoPI=');

        $this->withFactories(__DIR__.('/../database/factories'));
        $this->setUpDatabase();
        Notification::fake();
    }

    /**
     * Reset the Database
     * @return void
     */
    private function resetDatabase(): void
    {
        $this->artisan('migrate:fresh', [
            '--database' => 'sqlite',
        ]);
    }

    /**
     * Returns the array with unittest required package
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            AvoRedProvider::class,
        ];
    }

    /**
     * Set up the environment.
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ));
    }

    /**
     * Setup sqlite database for the unit test
     * @return void
     */
    protected function setUpDatabase(): void
    {
        $this->resetDatabase();
    }

    /**
     * Setup sqlite database for the unit test
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            //'AdminMenu' => 'AvoRed\\Framework\\AdminMenu\\Facade',
            //'AdminConfiguration' => 'AvoRed\\Framework\\AdminConfiguration\\Facade',
            //'Cart' => 'AvoRed\\Framework\\Cart\\Facade',
            //'DataGrid' => 'AvoRed\\Framework\\DataGrid\\Facade',
            //'Image' => 'AvoRed\\Framework\\Image\\Facade',
//            'Breadcrumb' => \AvoRed\Framework\Support\Facades\Breadcrumb::class,
//            'Menu' => \AvoRed\Framework\Support\Facades\Menu::class,
//            'Module' => \AvoRed\Framework\Support\Facades\Module::class,
//            'Permission' => \AvoRed\Framework\Support\Facades\Permission::class,
//            'GraphQL' => \Rebing\GraphQL\Support\Facades\GraphQL::class,
            //'Payment' => 'AvoRed\\Framework\\Payment\\Facade',
            //'Permission' => 'AvoRed\\Framework\\Permission\\Facade',
            //'Shipping' => 'AvoRed\\Framework\\Shipping\\Facade',
            //'Tabs' => 'AvoRed\\Framework\\Tabs\\Facade',
            //'Theme' => 'AvoRed\\Framework\\Theme\\Facade',
            //'Widget' => 'AvoRed\\Framework\\Widget\\Facade'
        ];
    }

    /**
     * Get Admin User Object for unit test
     * @param array $data
     * @return self
     */
    protected function createAdminUser($data = []): self
    {
        if (null === $this->user) {
            $this->user = factory(AdminUser::class)->create($data);
        }
        return $this;
    }
}
