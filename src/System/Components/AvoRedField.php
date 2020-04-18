<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\View\Component;

class AvoRedField extends Component
{

    /**
     * @var string
     */
    public $for;


    /**
     * @var string
     */
    public $label;


    /**
     * Create a new component instance.
     * @param $for
     * @param $label
     */
    public function __construct($for, $label)
    {
        $this->for = $for;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored::system.components.field');
    }

}
