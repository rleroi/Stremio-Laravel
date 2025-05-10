<?php

namespace App\Services;

use App\Services\Interfaces\CatalogServiceInterface;

class CatalogService implements CatalogServiceInterface
{
    public function getMetas(string $type, string $id, ?string $extra, ?string $config): array
    {
        // TODO: Implement actual data fetching
        return [
            [
                'id' => 'tt123',
                'name' => 'Big Buck Bunny',
                'year' => 2008,
                'poster' => 'https://image.tmdb.org/t/p/w500/example.jpg',
                'posterShape' => 'poster',
                'banner' => 'https://image.tmdb.org/t/p/original/example.jpg',
                'isFree' => true,
                'type' => 'movie'
            ]
        ];
    }
} 