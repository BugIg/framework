<?php
namespace AvoRed\Framework\Support;

use AvoRed\Framework\Support\Traits\BaseModelTrait;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Auth\User as Model;

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
    public static function options($optionValue, $optionLabel): Collection
    {
        return self::get()
            ->map(function ($model)  use ($optionLabel, $optionValue) {
                if (is_callable($optionLabel)) {
                    $label = $optionLabel($model);
                } else {
                    $label = $model->{$optionLabel} ?? '';
                }
                if (is_callable($optionValue)) {
                    $value = $optionValue($model);
                } else {
                    $value = $model->{$optionValue} ?? '';
                }
                return [
                    'label' => $label,
                    'value' => $value,
                ];
            });
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
