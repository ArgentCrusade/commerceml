<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\Parser;

class PricesTest extends TestCase
{
    public function testParsePrices()
    {
        $parser = new Parser($this->createService());
        $data = $parser->parse(realpath(__DIR__.'/fixtures/prices-example.xml'));

        $this->assertIsArray($data);
        $this->assertTrue(isset($data['offers_package']));
        $this->assertTrue(isset($data['offers_package']['offers']));

        $offers = $data['offers_package']['offers'];
        $this->assertSame(3, count($offers));

        foreach ($offers as $offer) {
            $this->assertTrue(isset($offer['prices']));
            $this->assertTrue(isset($offer['prices'][0]['unit_price']));
        }
    }
}
