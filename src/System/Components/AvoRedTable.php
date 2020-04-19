<?php

namespace AvoRed\Framework\System\Components;

use AvoRed\Framework\Support\CoreTable;
use Illuminate\View\Component;

class AvoRedTable extends Component
{
    public $table;

    /**
     * Create a new component instance.
     * @param $table
     */
    public function __construct(CoreTable $table)
    {
        $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored::system.components.table');
    }

    public function columns()
    {
        return $this->table->getColumns();
    }

    public function isPaginate()
    {
        return $this->table->paginate;
    }

    public function items()
    {
        return $this->table->model->paginate(10);
    }

    public function value($row, $column)
    {
        $key = $column['key'];
        return $row->{$key};
    }

    public function action($row, $column)
    {
        $callable = $column['callable'];
        return $callable($row);
    }
}
