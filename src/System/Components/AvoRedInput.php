<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\View\Component;

class AvoRedInput extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string $class
     */
    public $class;

    /**
     * Create a new component instance.
     * @param $name
     * @param string $type
     * @param string $class
     */
    public function __construct($name, $type = 'text', $class = '')
    {
        $this->name = $name;
        $this->type = $type;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored-admin::system.components.input');
    }

}
