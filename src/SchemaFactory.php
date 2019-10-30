<?php

declare(strict_types=1);

namespace Helicon\JsonSchemaMapper;

class SchemaFactory
{
    public function __invoke(string $schemaName): array
    {
        if (false === file_exists($schemaName)) {
            throw new \RuntimeException('json schema not found. name = '.$schemaName);
        }
        $jsonSchema = json_decode(file_get_contents($schemaName), true, 512, JSON_THROW_ON_ERROR);
        $schemas = [];
        foreach ($jsonSchema['properties'] as $property => $values) {
            $schemas[$property] = [
                'type' => $values['type'],
            ];
        }

        return $schemas;
    }
}
