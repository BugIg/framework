<?php

namespace AvoRed\Framework\Support\Contracts;

interface WidgetInterface
{
    /**
     * Get/Set Widget Type.
     * @param  string $type
     * @return $type|self
     */
    public function type($type = null);

    /**
     * Get/Set Widget Label.
     * @param  string $label
     * @return $label|self
     */
    public function label($label = null);
}
