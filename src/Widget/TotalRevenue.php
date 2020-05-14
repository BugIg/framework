<?php
namespace AvoRed\Framework\Widget;

class TotalRevenue
{
    /**
     * Widget View Path
     * @var string $view
     */

    protected $view = "avored-admin::widget.total-revenue";

    /**
     * Widget Label
     * @var string $view
     */

    protected $label = 'Total Revenue';

    /**
     * Widget Type
     * @var string $view
     */

    protected $type = WidgetManager::WIDGET_TYPES_CMS;

    /**
     * Widget unique identifier
     * @var string $identifier
     */
    protected $identifier = "avored-total-revenue";

    public function view()
    {
        return $this->view;
    }

    /*
     * Widget unique identifier
     *
     */
    public function identifier()
    {
        return $this->identifier;
    }

    /*
    * Widget unique identifier
    *
    */
    public function label()
    {
        return $this->label;
    }

    /*
    * Widget unique identifier
    *
    */
    public function type()
    {
        return $this->type;
    }

    /**
     * View Required Parameters
     *
     * @return array
     */
    public function with()
    {
        $value = rand(1000, 5000);
        return ['value' => $value];
    }

    public function render()
    {
        return view($this->view(), $this->with());
    }
}
