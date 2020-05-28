<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\Parser;

class ContractorsTest extends TestCase
{
    public function testParse()
    {
        $parser = new Parser($this->createService());
        $data = $parser->parse(realpath(__DIR__.'/fixtures/contractors-example.xml'));

        $this->assertSame(4, count($data['contractors']));
    }
}
