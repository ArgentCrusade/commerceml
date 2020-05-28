<?php

namespace ArgentCrusade\CommerceML\Tests;

use ArgentCrusade\CommerceML\Parser;

class GroupsTest extends TestCase
{
    public function testParseGroups()
    {
        $service = $this->createService();
        $parser = new Parser($service);

        $data = $parser->parse(realpath(__DIR__.'/fixtures/group-example.xml'));
        $this->assertIsArray($data);
        $this->assertTrue(isset($data['classificator']));

        $classificator = $data['classificator'];
        $this->assertSame('f3ad42fc-494e-47de-9c8f-6e2b2b31ddfb', $classificator['id']);
        $this->assertSame('Основной каталог товаров', $classificator['name']);

        $this->assertTrue(isset($classificator['groups']));
        $this->assertIsArray($classificator['groups']);

        $groups = collect($classificator['groups']);
        $this->assertSame(2, count($groups));

        $autoAccessoriesGroup = $groups->first(function (array $group) {
            return $group['id'] === 'dad4ab2a-8d6c-11e7-80e5-9e70408b1b6c';
        });
        $this->assertIsArray($autoAccessoriesGroup);
        $this->assertSame('Автомобильные аксессуары', $autoAccessoriesGroup['name']);
        $this->assertIsArray($autoAccessoriesGroup['groups']);
        $this->assertSame(3, count($autoAccessoriesGroup['groups']));

        $smartphonesAccessoriesGroup = $groups->first(function (array $group) {
            return $group['id'] === 'dad4ab29-8d6c-11e7-80e5-9e70408b1b6c';
        });
        $this->assertIsArray($smartphonesAccessoriesGroup);
    }

    public function testNestedGroupsShouldHaveParentIdField()
    {
        $service = $this->createService();
        $parser = new Parser($service);

        $data = $parser->parse(realpath(__DIR__.'/fixtures/group-example.xml'));
        $groups = collect($data['classificator']['groups']);
        $smartphonesAccessoriesGroup = $groups->first(function (array $group) {
            return $group['id'] === 'dad4ab29-8d6c-11e7-80e5-9e70408b1b6c';
        });

        $this->assertIsArray($smartphonesAccessoriesGroup['groups']);
        $this->assertSame(2, count($smartphonesAccessoriesGroup['groups']));
        $nestedGroup = collect($smartphonesAccessoriesGroup['groups'])->first(function (array $group) {
            return $group['id'] === 'b31fc676-8dbb-11e7-80e5-9e70408b1b6c';
        });

        $this->assertSame(1, count($nestedGroup['groups']));
        $subGroup = collect($nestedGroup['groups'])->first();
        $groupId = $subGroup['id'];

        foreach ($subGroup['groups'] as $group) {
            $this->assertSame($groupId, $group['parent_id']);
        }
    }
}
