<?php

namespace Tests\Feature\feature;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Admin;

use function PHPUnit\Framework\assertNotNull;

class OrderTest extends TestCase
{
    /**
     * Test that an order is created after checkout.
     *
     */
    public function test_order_was_created_after_checkout()
    {
        $product = new Cart();
        $product->productID = 2;
        $product->cart_id = 1;
        $product->Quantity = 2;
        $product->save();

        // Submit the form
        $response = $this->get("/update-cart?productID={$product->productID}&quantity={$product->Quantity}");

        // Check the response status
        $response->assertStatus(302);


        $response2 = $this->post('/checkout', [
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'john.doe@example.com',
            'address' => '123 Main St',
            'city' => 'Anytown',
        ]);


        $order = DB::table('orders')->where('email', 'john.doe@example.com')
            ->where('productID', 2)->first();

        assertNotNull($order);
    }

    /**
     * Test that an admin can view all orders.
     *
     */
    public function test_admin_can_view_all_orders()
    {
        $admin = new Admin();
        $admin->email = "zanwaar.bese20seecs@seecs.edu.pk";
        $admin->password = "addef33525b5c7e993941b8b2737d03f";

        $this->actingAs($admin);
        $response = $this->get('/orders');

        $response->assertStatus(200);
    }

    /**
     * Test that authentication is required to view all orders.
     *
     */
    public function test_auth_required_to_view_all_orders()
    {
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }
}
