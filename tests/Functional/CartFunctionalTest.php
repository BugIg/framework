<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Cart\CartManager;
use AvoRed\Framework\Catalog\Models\Product;
use AvoRed\Framework\Tests\BaseTestCase;

class ModuleFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_cart_manager_all()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        
        $product = factory(Product::class)->create();
        $status = $manager->add($product->slug);

        $this->assertEquals(true, $status);
    }
}
