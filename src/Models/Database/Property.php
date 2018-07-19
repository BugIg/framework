<?php

namespace AvoRed\Framework\Models\Database;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name', 'identifier', 'data_type', 'field_type', 'sort_order', 'use_for_all_products'];

    /**
     * Get the Select Property Dropdown options collection.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function propertyDropdownOptions()
    {
        return $this->hasMany(PropertyDropdownOption::class);
    }

    /**
     * Get the Property Boolean Value of a given Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function productPropertyBooleanValue()
    {
        return $this->hasMany(ProductPropertyBooleanValue::class);
    }

    /**
     * Get the Property Date Time Value of a given Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function productPropertyDatetimeValue()
    {
        return $this->hasMany(ProductPropertyDatetimeValue::class);
    }

    /**
     * Get the Property Decimal Value of a given Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function productPropertyDecimalValue()
    {
        return $this->hasMany(ProductPropertyDecimalValue::class);
    }

    /**
    * Get the Property Integer Value of a given Product.
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function productPropertyIntegerValue()
    {
        return $this->hasMany(ProductPropertyIntegerValue::class);
    }

    /**
    * Get the Property Text Value of a given Product.
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function productPropertyTextValue()
    {
        return $this->hasMany(ProductPropertyTextValue::class);
    }

    /**
     * Get the Property Varchar Value of a given Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function productPropertyVarcharValue()
    {
        return $this->hasMany(ProductPropertyVarcharValue::class);
    }

    /**
      * Attach  Product to a Property Model.
      *
      * @param \AvoRed\Framework\Models\Database\Product $model
      * @return \Illuminate\Database\Eloquent\Model
      */
    public function attachProduct($model)
    {
        $valueModel = $this->getProductValueModel($model->id);

        return $valueModel;
    }

    /**
    * Get Product Property Value Model based by ProductID.
    *
    * @param integer $productId
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function getProductValueModel($productId)
    {
        $dataType = ucfirst(strtolower($this->data_type));

        $method = 'productProperty' . $dataType . 'Value';

        $productPropertyModel = $this
                                        ->$method()
                                        ->whereProductId($productId)
                                        ->get();

        if ($productPropertyModel->count() == 0) {
            $valueClass = __NAMESPACE__ . '\\' . ucfirst($method);

            $valueModel = new $valueClass([
                                    'property_id' => $this->id,
                                    'product_id' => $productId
                                    ]);
        } else {
            $valueModel = $this->$method()->whereProductId($productId)->first();
        }
        //dd($valueModel);
        return $valueModel;
    }

    /*
      * Save Product Property based on its data_type.
      *
     public function saveProperty($productId, $propertyValue)
     {
         if ($this->data_type == 'VARCHAR') {
             $propertyVarcharValue = ProductPropertyVarcharValue::
                                             whereProductId($productId)
                                             ->wherePropertyId($this->id)->first();

             if (null === $propertyVarcharValue) {
                 ProductPropertyVarcharValue::create([
                     'product_id' => $productId,
                     'property_id' => $this->id,
                     'value' => $propertyValue,
                 ]);
             } else {
                 $propertyVarcharValue->update(['value' => $propertyValue]);
             }
         }

         if ($this->data_type == 'BOOLEAN') {
             $propertyBooleanValue = ProductPropertyBooleanValue::
                                             whereProductId($productId)
                                             ->wherePropertyId($this->id)->first();

             if (null === $propertyBooleanValue) {
                 ProductPropertyBooleanValue::create([
                     'product_id' => $productId,
                     'property_id' => $this->id,
                     'value' => $propertyValue,
                 ]);
             } else {
                 $propertyBooleanValue->update(['value' => $propertyValue]);
             }
         }

         if ($this->data_type == 'TEXT') {
             $propertyTextValue = ProductPropertyTextValue::
                                             whereProductId($productId)
                                             ->wherePropertyId($this->id)->get()->first();

             if (null === $propertyTextValue) {
                 ProductPropertyTextValue::create([
                     'product_id' => $productId,
                     'property_id' => $this->id,
                     'value' => $propertyValue,
                 ]);
             } else {
                 $propertyTextValue->update(['value' => $propertyValue]);
             }
         }

         if ($this->data_type == 'DECIMAL') {
             $propertyDecimalValue = ProductPropertyDecimalValue::
                                                 whereProductId($productId)
                                                 ->wherePropertyId($this->id)->first();

             if (null === $propertyDecimalValue) {
                 ProductPropertyDecimalValue::create([
                     'product_id' => $productId,
                     'property_id' => $this->id,
                     'value' => $propertyValue,
                 ]);
             } else {
                 $propertyDecimalValue->update(['value' => $propertyValue]);
             }
         }

         if ($this->data_type == 'INTEGER') {
             $propertyIntegerValue = ProductPropertyIntegerValue::
                                                 whereProductId($productId)
                                                 ->wherePropertyId($this->id)->get()->first();

             if (null === $propertyIntegerValue) {
                 ProductPropertyIntegerValue::create([
                     'product_id' => $productId,
                     'property_id' => $this->id,
                     'value' => $propertyValue,
                 ]);
             } else {
                 $propertyIntegerValue->update(['value' => $propertyValue]);
             }
         }

         if ($this->data_type == 'DATETIME') {
             $propertyDatetimeValue = ProductPropertyDatetimeValue::
                                                 whereProductId($productId)
                                                 ->wherePropertyId($this->id)->get()->first();

             if (null === $propertyDatetimeValue) {
                 ProductPropertyDatetimeValue::create([
                     'product_id' => $productId,
                     'property_id' => $this->id,
                     'value' => $propertyValue,
                 ]);
             } else {
                 $propertyDatetimeValue->update(['value' => $propertyValue]);
             }
         }
     }
     */
}
