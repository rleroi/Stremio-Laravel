<?php

namespace Tests\Unit\Services;

use App\DataTransferObjects\AddonConfig;
use App\Services\AddonConfigService;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AddonConfigServiceTest extends TestCase
{
    private AddonConfigService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AddonConfigService();
    }

    public function test_get_default_config_returns_correct_structure()
    {
        $config = $this->service->getDefaultConfig();

        $this->assertInstanceOf(AddonConfig::class, $config);
        $this->assertEquals('your-api-key-here', $config->apiKey);
        $this->assertEquals('US', $config->region);
        $this->assertEquals('en', $config->language);
    }

    public function test_resolve_returns_default_config_when_no_config_provided()
    {
        $config = $this->service->resolve(null);

        $this->assertInstanceOf(AddonConfig::class, $config);
        $this->assertEquals('your-api-key-here', $config->apiKey);
    }

    public function test_load_config_caches_result()
    {
        $configName = 'test-config';
        
        Cache::shouldReceive('remember')
            ->once()
            ->with("config.{$configName}", 3600, \Closure::class)
            ->andReturn($this->service->getDefaultConfig());

        $config = $this->service->loadConfig($configName);

        $this->assertInstanceOf(AddonConfig::class, $config);
    }
} 