<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\Parser;

class DocumentsTest extends TestCase
{
    public function testDocumentsList()
    {
        $service = $this->createService();
        $parser = new Parser($service);

        $data = $parser->parse(realpath(__DIR__.'/fixtures/documents-example.xml'));
        $this->assertSame(2, count($data['documents']));
    }
}
