<?php

namespace AvoRed\Framework\Support\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\LighthouseServiceProvider;

class GraphqlProvider extends ServiceProvider
{
  
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the Service Provider.
     * @return void
     */
    public function boot()
    {
        $this->registerLightHouseProvider();
        $this->registerGraphqlData();
    }

    /**
     * Registering Dynamic Schemas & Types
     * @param \Rebing\GraphQL\GraphQL $graphql
     * @return void
     */
    public function registerGraphqlData(): void
    {
        $lightHouseConfig = $this->app['config']->get('lighthouse', []);
        $avoredConfig = $this->app['config']->get('avored', []);
        
        
        $this->app['config']->set(
            'lighthouse',
            array_replace_recursive($lightHouseConfig, $avoredConfig['graphql'])
        );
    }

    /**
     * Registering the light house provider in order to override config and etc.
     * @return void
     */
    public function registerLightHouseProvider()
    {
        App::register(LighthouseServiceProvider::class);
    }

}
