<?php

declare(strict_types=1);

namespace Helicon\JsonSchemaMapper;

use Helicon\TypeConverter\ConverterInterface;

class JsonSchemaMapper implements MapperInterface
{
    /**
     * @var ConverterInterface
     */
    private $converter;

    /**
     * @param ConverterInterface $converter
     */
    public function __construct(ConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    public function __invoke(array $data, string $jsonSchemaFile)
    {
        return ($this->converter)($data, (new SchemaFactory())($jsonSchemaFile));
    }
}
