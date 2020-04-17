<?php

namespace AvoRed\Framework\System\Components;

use Illuminate\View\Component;

class AvoRedTable extends Component
{
    /**
     * Collection of Model/Array
     * @var mixed $data
     */
    public $data;

    /**
     * Collection of Model/Array
     * @var mixed $columns
     */
    public $columns;


    /**
     * Create a new component instance.
     * @param mixed $data
     * @param mixed $columns
     * @return void
     */
    public function __construct($data, $columns)
    {

        $this->data = $data;
        $this->columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored::system.components.table')
            ->with('data', $this->data);
    }

    public function value($row, $column)
    {
        $key = $column['key'];
        return $row->{$key};
    }
}
