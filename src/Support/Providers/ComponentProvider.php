<?php

namespace AvoRed\Framework\Support\Providers;

use AvoRed\Framework\System\Components\AvoRedInput;
use AvoRed\Framework\System\Components\AvoRedField;
use AvoRed\Framework\System\Components\AvoRedTable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentProvider extends ServiceProvider
{
    protected $components = [
        'avored-table' => AvoRedTable::class,
        'avored-field' => AvoRedField::class,
        'avored-input' => AvoRedInput::class,
    ];

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
        $this->registerComponents();
    }


    /**
     * Register Admin Menu for the AvoRed E commerce package.
     * @return void
     */
    public function registerComponents()
    {
        foreach ($this->components as $key => $class) {
            Blade::component($key, $class);
        }
    }
}
