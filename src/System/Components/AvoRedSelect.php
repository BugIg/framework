<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class AvoRedSelect extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var Collection $options
     */
    public $options;

    /**
     * @var mixed $value
     */
    public $value;

    /**
     * Create a new component instance.
     * @param $name
     * @param Collection $options
     * @param $value
     */
    public function __construct($name, $options, $value)
    {
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored::system.components.select');
    }

}
