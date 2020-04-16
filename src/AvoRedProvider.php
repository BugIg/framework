<?php

namespace AvoRed\Framework;

use AvoRed\Framework\System\Console\AdminMakeCommand;
use AvoRed\Framework\System\Console\InstallCommand;
use AvoRed\Framework\System\Middleware\AdminAuth;
use AvoRed\Framework\System\Middleware\RedirectIfAdminAuth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class AvoRedProvider extends ServiceProvider
{
    /**
     * Providers List for the Framework.
     * @var array
     */
    protected $providers = [
        \AvoRed\Framework\Support\Providers\MenuProvider::class,
    ];

    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        $this->registerProviders();
        $this->registerConfigData();
        $this->registerRoutePath();
        $this->registerMiddleware();
//        $this->registerViewComposerData();
        $this->registerConsoleCommands();
        $this->registerMigrationPath();
        $this->registerViewPath();
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot()
    {
        $this->registerTranslationPath();
        $this->setupPublishFiles();
    }

    /**
     * Register Route Path.
     * @return void
     */
    public function registerRoutePath()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    /**
     * Register Console Commands.
     * @return void
     */
    public function registerConsoleCommands()
    {
        $this->commands(InstallCommand::class);
        $this->commands(AdminMakeCommand::class);
    }

    /**
     * Register Migration Path.
     * @return void
     */
    public function registerMigrationPath()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register View Path.
     * @return void
     */
    public function registerViewPath()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'avored');
    }

    /**
     * Register Translation Path.
     * @return void
     */
    public function registerTranslationPath()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'avored');
    }

    /**
     * Registering AvoRed E commerce Service Provider
     * @return void
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            App::register($provider);
        }
    }

    /**
     * Registering AvoRed E commerce Middleware.
     * @return void
     */
    protected function registerMiddleware()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('admin.auth', AdminAuth::class);
        $router->aliasMiddleware('admin.guest', RedirectIfAdminAuth::class);
    }

    /**
     * Register config data for AvoRed E commerce Framework
     * @return void
     */
    public function registerConfigData()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/avored.php',
            'avored'
        );
        $avoredConfigData = include __DIR__.'/../config/avored.php';
        $authConfig = $this->app['config']->get('auth', []);
        $this->app['config']->set(
            'auth',
            array_merge_recursive($avoredConfigData['auth'], $authConfig)
        );
    }

    /**
     * Registering Class Based View Composer.
     * @return void
     */
    public function registerViewComposerData()
    {
//        View::composer('avored::layouts.app', LayoutComposer::class);
    }

   /**
    * Set up the file which can be published to use the package
    * @return void
    */
    public function setupPublishFiles()
    {
        $this->publishes([
            __DIR__.'/../config/avored.php' => config_path('avored.php')
        ]);
        $this->publishes([
            __DIR__.'/../dist' => public_path('vendor/avored')
        ]);
    }
}
