<?php

namespace App\Services\Interfaces;

interface CatalogServiceInterface
{
    /**
     * Get metadata items for a given type and id
     *
     * @param string $type
     * @param string $id
     * @param string|null $extra
     * @param string|null $config
     * @return array<array>
     */
    public function getMetas(string $type, string $id, ?string $extra, ?string $config): array;
}
