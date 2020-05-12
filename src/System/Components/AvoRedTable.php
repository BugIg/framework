<?php

namespace AvoRed\Framework\System\Components;

use AvoRed\Framework\Support\CoreTable;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class AvoRedTable extends Component
{
    public $table;
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var int $perPage
     */
    public $perPage = 10;

    /**
     * Create a new component instance.
     * @param CoreTable $table
     * @param Request $request
     */
    public function __construct(CoreTable $table, Request $request)
    {
        $this->table = $table;
        $this->request = $request;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('avored-admin::system.components.table');
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
        $query = $this->table->model->query();

        $sort = $this->request->get('sort', []);

        if (count($sort) > 0) {
           foreach ($sort as $sortKey => $sortOrder) {
               $query->orderBy($sortKey, $sortOrder);
           }
        }

        return $query->paginate($this->perPage);
    }

    public function value($row, $column)
    {
        $key = $column['key'];
        return $row->{$key} ?? '';
    }

    public function isSortable($col)
    {
        return $col['sortable'] ?? false;
    }


    public function sortOrder($col)
    {
        $order = 'asc';
        $sort = $this->request->get('sort', []);
        if (count($sort) > 0)
        {
            foreach ($sort as $sortKey => $sortOrder) {
                if ($sortKey === $col['key']) {
                    $order = $sortOrder;
                }
            }
        }
        return $order;
    }

    public function action($row, $column)
    {
        $callable = $column['callable'];
        return $callable($row);
    }
}
