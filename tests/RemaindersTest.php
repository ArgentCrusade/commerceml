<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\Parser;

class RemaindersTest extends TestCase
{
    public function testParseRemainders()
    {
        $parser = new Parser($this->createService());
        $data = $parser->parse(realpath(__DIR__.'/fixtures/remainders-example.xml'));

        $this->assertIsArray($data);
        $this->assertTrue(isset($data['offers_package']));
        $this->assertTrue(isset($data['offers_package']['offers']));

        $offers = $data['offers_package']['offers'];
        $this->assertSame(2, count($offers));

        foreach ($offers as $offer) {
            $this->assertTrue(!empty($offer['rests']));
        }
    }
}
