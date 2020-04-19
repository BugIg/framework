<?php
namespace AvoRed\Framework\Support;

use Illuminate\Database\Eloquent\Model;
use AvoRed\Framework\Support\Traits\BaseModelTrait;

class BaseModel extends Model
{
    use BaseModelTrait;

    public function __construct(array $attributes = [])
    {
        $tablePrefix  = config('avored.table_prefix');

        $tableName = $tablePrefix . $this->getTable();
        $this->table = $tableName;
        parent::__construct($attributes);
    }
}
