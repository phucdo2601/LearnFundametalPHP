<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test for name equal slug
     */

    public function test_name_equal_slug(): void
    {
        $product = new Product([
            'name' => 'test product b01',
            'slug' => 'test-product-b01'
        ]);
        var_dump($product->customName());
        $this->assertTrue($product->customName());
    }
}
