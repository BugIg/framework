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
     * Get the Model by given slug
     * @param string $slug
     * @return self
     */
    public static function slug($slug): BaseModel
    {
        $local = app()->getLocale();
        $model = new static;
        
        return $model->whereJsonContains('slug->' . $local, $slug)->first();
    }
    
}
