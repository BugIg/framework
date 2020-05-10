<?php
namespace AvoRed\Framework\Support;

use Illuminate\Database\Eloquent\Model;
use AvoRed\Framework\Support\Traits\BaseModelTrait;
use Illuminate\Support\Collection;

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

    /**
     * @param string $optionValue
     * @param $optionLabel
     * @return Collection
     */
    public static function options($optionValue = 'id', string $optionLabel): Collection
    {
        $query = self::query();
        return $query->pluck($optionLabel, $optionValue);
    }
    
     /**
     * Add a basic where clause to the query.
     *
     * @param  \Closure|string|array  $column
     * @param  mixed  $operator
     * @param  mixed  $value
     * @param  string  $boolean
     * @return $this
     */
    public static function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        $query = self::query();
        //$data = $model->where($column, $operator, $value, $boolean);
        dd($query->where('slug', 'test'));
    }
}
