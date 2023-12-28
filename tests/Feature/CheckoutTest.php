<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartTest extends TestCase
{
    /**
     * Test whether the URL /cart returns a status code of 200.
     *
     */
    public function test_cart_url_status_ok()
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
    }

    /**
     * Test that the carts table is initially empty.
     *
     */
    public function test_cart_should_be_initially_empty()
    {
        $items = DB::table('carts')->get();
        $this->assertEmpty($items);
    }

    /**
     * Test the addition of a product to the cart.
     *
     */
    public function test_add_product_to_cart()
    {
        $productId = 1;
        $response = $this->get("/add-to-cart/{$productId}");
        $response->assertStatus(302);

        $item = DB::table('carts')->get()->where('productID', $productId);
        $this->assertNotNull($item);
    }

     /**
     * Test attempting to add a nonexistent product to the cart.
     *
     */
    public function test_add_nonexistant_product_to_cart()
    {
        $productId = 1000;
        $response = $this->get("/add-to-cart/{$productId}");
        $response->assertSessionHasErrors();
    }

    /**
     * Test the ability to change the quantity of a product in the cart.
     *
     */
    public function test_change_quantity_of_product_in_cart()
    {
        $product = new Cart();
        $product->productID = 1;
        $product->cart_id = 1;
        $product->Quantity = 2;
        $product->save();

        // Submit the form
        $response = $this->get("/update-cart?productID={$product->productID}&quantity={$product->Quantity}");

        // Check the response status
        $response->assertStatus(302);

        // Check if the product quantity was updated in the database
        $cartItem = Cart::where('productID', $product->productID)->first();
        $this->assertEquals($product->Quantity, $cartItem->Quantity);
    }

     /**
     * Test that the quantity of a product in the cart cannot be negative.
     *
     */
    public function test_cart_product_quantity_shouldnt_be_negative()
    {
        $product = new Cart();
        $product->productID = 1;
        $product->cart_id = 1;
        $product->Quantity = -2;
        $product->save();

        // Submit the form
        $response = $this->get("/update-cart?productID={$product->productID}&quantity={$product->Quantity}");

        $response->assertSessionMissing('cart');
        $response->assertSessionHasErrors(['quantity']);
    }
    
    /**
     * Test that the quantity of a product in the cart cannot be zero.
     *
     */
    public function test_cart_product_quantity_shouldnt_be_zero()
    {
        $product = new Cart();
        $product->productID = 1;
        $product->cart_id = 1;
        $product->Quantity = 0;
        $product->save();

        // Submit the form
        $response = $this->get("/update-cart?productID={$product->productID}&quantity={$product->Quantity}");

        $response->assertSessionMissing('cart');
        $response->assertSessionHasErrors(['quantity']);
    }

    /**
     * Test that the quantity of a product in the cart cannot exceed the available inventory.
     *
     */
    public function test_cart_product_quantity_should_be_less_than_or_equal_to_inventory()
    {
        $product = new Cart();
        $product->productID = 2;
        $product->cart_id = 1;
        $product->Quantity = 20;
        $product->save();

        // Submit the form
        $response = $this->get("/update-cart?productID={$product->productID}&quantity={$product->Quantity}");

        $response->assertSessionMissing('cart');
        $response->assertSessionHasErrors(['quantity']);
    }
}
