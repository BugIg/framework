<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Widget\WidgetManager;
use AvoRed\Framework\Tests\BaseTestCase;
use AvoRed\Framework\Widget\Widget;
use Illuminate\Support\Collection;
use Mockery;
use stdClass;

class WidgetFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_widget_manager_all()
    {
        $manager = new WidgetManager();;
        $widget = new stdClass;

        $manager->make('test-widget', $widget);

        $this->assertEquals(1, $manager->all()->count());
    } 
    
    /** @test **/
    public function test_widget_manager_get()
    {
        $manager = new WidgetManager();;
        $widget = new stdClass;

        $manager->make('test-widget', $widget);

        $this->assertInstanceOf(stdClass::class, $manager->get('test-widget'));
    }
    /** @test **/
    public function test_widget_manager_options()
    {
        $manager = new WidgetManager();;
        $widget = Mockery::mock(stdClass::class);
        $widget->shouldReceive('label')
             ->andReturn('test label');

        $manager->make('test-widget', $widget);

        $this->assertInstanceOf(Collection::class, $manager->options());
        $this->assertEquals(1, $manager->options()->count());
    }

    /** @test **/
    public function test_widget_label()
    {
        $manager = new WidgetManager();
        $widget = Mockery::mock(stdClass::class);
        $widget
            ->shouldReceive('label')
            ->andReturn('test label')
            ->shouldReceive('type')
            ->andReturn(WidgetManager::WIDGET_TYPES_CMS)
            ;

        $managerWidget = $manager->make('test-widget', $widget)
            ->get('test-widget');
            
        $this->assertEquals('test label', $managerWidget->label());
    }

    /** @test **/
    public function test_widget_type()
    {
        $manager = new WidgetManager();
        $widget = Mockery::mock(stdClass::class);
        $widget
            ->shouldReceive('label')
            ->andReturn('test label')
            ->shouldReceive('type')
            ->andReturn(WidgetManager::WIDGET_TYPES_CMS)
            ;

        $managerWidget = $manager->make('test-widget', $widget)
            ->get('test-widget');

        $this->assertEquals(WidgetManager::WIDGET_TYPES_CMS, $managerWidget->type());
    }
}
