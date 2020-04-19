<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\View\Component;

class AvoRedTab extends Component
{

    /**
     * @var string
     */
    public $tab;


    /**
     * Create a new component instance.
     * @param $tab
     */
    public function __construct($tab)
    {
        $this->tab = $tab;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored::system.components.tab');
    }

}
