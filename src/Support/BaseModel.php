<?php
namespace AvoRed\Framework\Support;

use Illuminate\Database\Eloquent\Model;
use AvoRed\Framework\Support\Traits\BaseModelTrait;

class BaseModel extends Model
{
    use BaseModelTrait;

    /**
     * @var string $tablePrefix
     */
    public $tablePrefix;

    public function __construct(array $attributes = [])
    {
        $this->tablePrefix  = config('avored.table_prefix');

        $tableName = $this->tablePrefix . $this->getTable();
        $this->table = $tableName;
        parent::__construct($attributes);
    }
}
