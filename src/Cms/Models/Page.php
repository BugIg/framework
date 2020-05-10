<?php

namespace AvoRed\Framework\Cms\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;
use AvoRed\Framework\Support\Facades\Widget;

class Page extends BaseModel
{

    /**
     * Widget Content Tag
     * @var array
     */
    protected $contentTags = ['%%%', '%%%'];

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'content',
        'meta_title',
        'meta_description'
    ];

    /**
     * The attributes that are castable.
     * @var array
     */
    protected $casts = [
        'name' => TranslatableCast::class,
        'slug' => TranslatableCast::class,
        'content' => TranslatableCast::class,
        'meta_title' => TranslatableCast::class,
        'meta_description' => TranslatableCast::class,
    ];

    /**
     * Get the Content and make sure if it has widget key then render the widget too
     * @return string
     */
    public function getContent()
    {
        $content = $this->content;
        $pattern = sprintf('/(@)?%s\s*(.+?)\s*%s(\r?\n)?/s', $this->contentTags[0], $this->contentTags[1]);
        $callback = function ($matches) {
            $whitespace = empty($matches[3]) ? '' : $matches[3] . $matches[3];
            $widget = Widget::get($matches[2]);

            if (method_exists($widget, 'render')) {
                $widgetContent = $widget->render();
            } else {
                $widgetContent = '';
            }
            return $matches[1] ? substr($matches[0], 1) : "{$widgetContent}{$whitespace}";
        };
        return preg_replace_callback($pattern, $callback, $content);
    }
}
