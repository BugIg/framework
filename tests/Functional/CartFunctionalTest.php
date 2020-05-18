<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Cart\CartManager;
use AvoRed\Framework\Catalog\Models\Product;
use AvoRed\Framework\Tests\BaseTestCase;

class CartFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_cart_manager_all()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        
        $product = factory(Product::class)->create();
        $status = $manager->add($product->slug);
        $cartItems = $manager->all();
        $this->assertEquals(true, $status);
        $this->assertEquals(1, count($cartItems));
    }
    /** @test **/
    public function test_cart_manager_destory()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        
        $product = factory(Product::class)->create();
        $manager->add($product->slug);
        $manager->destroy($product->slug);
        $cartItems = $manager->all();

        $this->assertEquals(0, count($cartItems));
    } 
    /** @test **/
    public function test_cart_manager_update()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        
        $product = factory(Product::class)->create();
        $manager->add($product->slug);
        $manager->update($product->slug, 4);
        $cartItem = $manager->all()->first();
        
        $this->assertEquals(4, $cartItem->qty());
    }
    /** @test **/
    public function test_cart_manager_clear()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        
        $product = factory(Product::class)->create();
        $manager->add($product->slug);
        $manager->update($product->slug, 4);
        $manager->clear();
        $cartItem = $manager->all();
        
        $this->assertEquals(0, count($cartItem));
    }
    
    /** @test **/
    public function test_cart_manager_total()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['price' => 50]);


        $manager->add($product->slug);
        $manager->update($product->slug, 4);
        $total = $manager->total();
        
        $this->assertEquals(200, $total); // 50 * 4
    }
    /** @test **/
    public function test_cart_manager_count()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['price' => 50]);
        $manager->add($product->slug);

        $count = $manager->count();
        
        $this->assertEquals(1, $count);
    }
     
    /** @test **/
    public function test_cart_item_name()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['name' => 'test name']);
        $manager->add($product->slug);
    
        $cartItem = $manager->all()->first();
        
        $this->assertEquals('test name', $cartItem->name());
    }
    
    /** @test **/
    public function test_cart_item_id()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['name' => 'test name']);
        $manager->add($product->slug);
    
        $cartItem = $manager->all()->first();
        
        $this->assertEquals($product->id, $cartItem->id());
    }

    /** @test **/
    public function test_cart_item_slug()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['name' => 'test name']);
        $manager->add($product->slug);
    
        $cartItem = $manager->all()->first();
        
        $this->assertEquals($product->slug, $cartItem->slug());
    }

    /** @test **/
    public function test_cart_item_qty()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['name' => 'test name']);
        $manager->add($product->slug);
    
        $cartItem = $manager->all()->first();
        
        $this->assertEquals(1, $cartItem->qty());
    }

    /** @test **/
    public function test_cart_item_price()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['price' => 50.35]);
        $manager->add($product->slug);
    
        $cartItem = $manager->all()->first();
        
        $this->assertEquals(50.35, $cartItem->price());
    }

    /** @test **/
    public function test_cart_item_total()
    {
        $sessionManager = app()->get('session');
        $manager = new CartManager($sessionManager);
        $product = factory(Product::class)->create(['price' => 50.23]);
        $manager->add($product->slug);
    
        $cartItem = $manager->all()->first();
        
        $this->assertEquals(50.23, $cartItem->total()); // 50.23 * 1 
    }

    
}
