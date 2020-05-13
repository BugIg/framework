<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Payment\Manager;
use AvoRed\Framework\Tests\BaseTestCase;
use Mockery;
use stdClass;

class PaymentFunctionalTest extends BaseTestCase
{
     /** @test **/
     public function test_payment_manager_all()
     {
         $manager = new Manager();
         $payment = Mockery::mock(stdClass::class);
         $payment->shouldReceive('identifier')
             ->andReturn('test-identifier');
 
         $manager->put($payment);
 
         $this->assertEquals(1, $manager->all()->count());
     } 
     
     /** @test **/
     public function test_payment_manager_get()
     {
         $manager = new Manager();
         $payment = Mockery::mock(stdClass::class);
         $payment->shouldReceive('identifier')
             ->andReturn('test-identifier');
         $manager->put($payment);
         
         $this->assertInstanceOf(stdClass::class, $manager->get('test-identifier'));
     }
}
