<?php

namespace AvoRed\Framework\Support\Providers;

use AvoRed\Framework\System\Components\AvoRedInput;
use AvoRed\Framework\System\Components\AvoRedField;
use AvoRed\Framework\System\Components\AvoRedSelect;
use AvoRed\Framework\System\Components\AvoRedTab;
use AvoRed\Framework\System\Components\AvoRedTable;
use AvoRed\Framework\System\Components\AvoRedEditor;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentProvider extends ServiceProvider
{
    protected $components = [
        'avored-field' => AvoRedField::class,
        'avored-input' => AvoRedInput::class,
        'avored-table' => AvoRedTable::class,
        'avored-select' => AvoRedSelect::class,
        'avored-editor' => AvoRedEditor::class,
        'avored-tab' => AvoRedTab::class,
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
