<?php
namespace AvoRed\Framework\Support;

use Illuminate\Database\Eloquent\Model;

abstract class CoreTable
{

    /**
     * @var Model
     */
    public $model;
    /**
     * @var bool
     */
    public $paginate;

    public function __construct($model, $paginate = true)
    {
        if ($model instanceof Model) {
            $this->model = $model;
        } else {
            $this->model = new $model;
        }
        $this->paginate = $paginate;
    }

    abstract public function getColumns();
}
