<?php

declare(strict_types=1);

namespace Helicon\JsonSchemaMapper;

interface MapperInterface
{
    /**
     * @param array  $data
     * @param string $jsonSchemaFile
     *
     * @return mixed object
     */
    public function __invoke(array $data, string $jsonSchemaFile);
}
