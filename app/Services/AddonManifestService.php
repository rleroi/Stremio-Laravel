<?php

namespace App\Services;

use App\DataTransferObjects\AddonConfig;
use App\Services\Interfaces\AddonManifestServiceInterface;

class AddonManifestService implements AddonManifestServiceInterface
{
    private const DEFAULT_ID = 'org.stremio.laravel';
    private const DEFAULT_VERSION = '0.0.1';
    private const DEFAULT_DESCRIPTION = 'Laravel Stremio Add-on';
    private const DEFAULT_NAME = 'Laravel Add-on';
    private const DEFAULT_RESOURCES = ['catalog', 'meta', 'stream', 'subtitles'];
    private const DEFAULT_TYPES = ['movie', 'series'];
    private const DEFAULT_CATALOGS = [
        [
            'type' => 'movie',
            'id' => 'moviecatalog'
        ]
    ];
    private const DEFAULT_ID_PREFIXES = ['tt'];

    public function generate(?AddonConfig $config = null): array
    {
        $name = $config ? "Laravel Add-on ({$config->region})" : self::DEFAULT_NAME;
        $description = $config ? "Laravel Stremio Add-on - {$config->language} content" : self::DEFAULT_DESCRIPTION;

        return [
            'id' => self::DEFAULT_ID,
            'version' => self::DEFAULT_VERSION,
            'description' => $description,
            'name' => $name,
            'resources' => self::DEFAULT_RESOURCES,
            'types' => self::DEFAULT_TYPES,
            'catalogs' => self::DEFAULT_CATALOGS,
            'idPrefixes' => self::DEFAULT_ID_PREFIXES,
        ];
    }
} 