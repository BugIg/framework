<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Shipping\Manager;
use AvoRed\Framework\Tests\BaseTestCase;
use Mockery;
use stdClass;

class ShippingFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_shipping_manager_all()
    {
        $manager = new Manager();
        $shipping = Mockery::mock(stdClass::class);
        $shipping->shouldReceive('identifier')
            ->andReturn('test-identifier');

        $manager->put($shipping);

        $this->assertEquals(1, $manager->all()->count());
    } 
    
    /** @test **/
    public function test_shipping_manager_get()
    {
        $manager = new Manager();
        $shipping = Mockery::mock(stdClass::class);
        $shipping->shouldReceive('identifier')
            ->andReturn('test-identifier');
        $manager->put($shipping);
        
        $this->assertInstanceOf(stdClass::class, $manager->get('test-identifier'));
    }
}
