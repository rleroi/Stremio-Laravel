<?php

namespace Tests\Unit\Services;

use App\DataTransferObjects\AddonConfig;
use App\Services\AddonManifestService;
use Tests\TestCase;

class AddonManifestServiceTest extends TestCase
{
    private AddonManifestService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AddonManifestService();
    }

    public function test_generate_returns_default_manifest_when_no_config_provided()
    {
        $manifest = $this->service->generate();

        $this->assertEquals('org.stremio.laravel', $manifest['id']);
        $this->assertEquals('0.0.1', $manifest['version']);
        $this->assertEquals('Laravel Stremio Add-on', $manifest['description']);
        $this->assertEquals('Laravel Add-on', $manifest['name']);
        $this->assertEquals(['catalog', 'meta', 'stream', 'subtitles'], $manifest['resources']);
        $this->assertEquals(['movie', 'series'], $manifest['types']);
        $this->assertEquals([['type' => 'movie', 'id' => 'moviecatalog']], $manifest['catalogs']);
        $this->assertEquals(['tt'], $manifest['idPrefixes']);
    }

    public function test_generate_returns_customized_manifest_when_config_provided()
    {
        $config = new AddonConfig(
            apiKey: 'test-key',
            region: 'UK',
            language: 'en'
        );

        $manifest = $this->service->generate($config);

        $this->assertEquals('Laravel Add-on (UK)', $manifest['name']);
        $this->assertEquals('Laravel Stremio Add-on - en content', $manifest['description']);
    }
} 