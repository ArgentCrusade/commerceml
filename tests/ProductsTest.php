<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\Parser;

class ProductsTest extends TestCase
{
    public function testProductShouldHaveAnArrayOfImages()
    {
        $service = $this->createService();
        $parser = new Parser($service);

        $data = $parser->parse(realpath(__DIR__.'/fixtures/products-example.xml'));
        $product = $data['catalog']['products'][0];
        $this->assertSame('ac0184b3-7821-11e6-80ca-a72a8c906e0a', $product['id']);
    }

    public function testProductImages()
    {
        $parser = new Parser($this->createService());
        $data = $parser->parse(realpath(__DIR__.'/fixtures/products-example.xml'));
        $images = $data['catalog']['products'][0]['images'];

        $this->assertIsArray($images);
        $this->assertSame(5, count($images));
    }
}
