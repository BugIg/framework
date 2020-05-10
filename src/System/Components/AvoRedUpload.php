<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\View\Component;

class AvoRedUpload extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $value;

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
    public function __construct($name, $value= '', $class = '')
    {
        $this->name = $name;
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored-admin::system.components.upload');
    }

}
