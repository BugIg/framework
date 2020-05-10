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
     * @param $label
     * @param $for
     */
    public function __construct($label, $for = '')
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
        return view('avored-admin::system.components.field');
    }

}
