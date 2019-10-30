<?php

declare(strict_types=1);

namespace Helicon\JsonSchemaMapper\Tests;

use Helicon\JsonSchemaMapper\JsonSchemaMapper;
use Helicon\JsonSchemaMapper\NumberTypeCaster;
use Helicon\TypeConverter\Converter;
use Helicon\TypeConverter\Resolver;
use Helicon\TypeConverter\TypeCaster\ScalarTypeCaster;
use PHPUnit\Framework\TestCase;

class JsonSchemaMapperTest extends TestCase
{
    public function testMapping()
    {
        $resolver = new Resolver();
        $resolver->addConverter(new NumberTypeCaster());
        $resolver->addConverter(new ScalarTypeCaster());
        $converter = new Converter($resolver);
        $mapper = new JsonSchemaMapper($converter);

        $data = [
            'name' => 'polidog',
            'age' => '33',
            'weight' => '88.4',
        ];

        $actual = ($mapper)($data, __DIR__.'/schema.json');
        $this->assertSame('polidog', $actual['name']);
        $this->assertSame(33, $actual['age']);
        $this->assertSame(88.4, $actual['weight']);
    }
}
