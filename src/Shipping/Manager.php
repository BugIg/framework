<?php

namespace AvoRed\Framework\Shipping;

use Illuminate\Support\Collection;

class Manager
{
    /**
     * Shipping Options collection.
     * @var \Illuminate\Support\Collection
     */
    public $collection;

    /**
     * Construct for the Shipping Manager.
     */
    public function __construct()
    {
        $this->collection = Collection::make([]);
    }

    /**
     * Get all the Shipping Options Collection.
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return $this->collection;
    }

    /**
     * Put Shipping class to an collection Collection.
     * @return void
     */
    public function put($shipping)
    {
        $this->collection->put($shipping->identifier(), $shipping);
    } 
    
    /**
     * Gut Shipping class to an collection Collection.
     * @return mixed
     */
    public function get($identifier)
    {
        return $this->collection->get($identifier);
    }

}
