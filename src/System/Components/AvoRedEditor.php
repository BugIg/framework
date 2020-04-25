<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\View\Component;

class AvoRedEditor extends Component
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
     * Create a new component instance.
     * @param $name
     * @param string $type
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored::system.components.editor');
    }

}
