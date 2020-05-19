<?php

namespace AvoRed\Framework\Support\Contracts;

interface WidgetInterface
{
    /**
     * Get Widget Type.
     * @return $type|self
     */
    public function type();

    /**
     * Get Widget Label.
     * @return $label|self
     */
    public function label();
}
