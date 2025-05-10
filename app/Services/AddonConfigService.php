<?php

namespace App\Services;

use App\DataTransferObjects\AddonConfig;
use App\Services\Interfaces\AddonConfigServiceInterface;
use Illuminate\Support\Facades\Cache;

class AddonConfigService implements AddonConfigServiceInterface
{
    public function resolve(?string $config): AddonConfig
    {
        if ($config === null) {
            return $this->getDefaultConfig();
        }

        return $this->loadConfig($config);
    }

    public function getDefaultConfig(): AddonConfig
    {
        return new AddonConfig(
            apiKey: 'your-api-key-here',
            region: 'US',
            language: 'en',
        );
    }

    public function loadConfig(string $config): AddonConfig
    {
        return Cache::remember("config.{$config}", 3600, function () use ($config) {
            // TODO: Implement actual config loading from storage
            return $this->getDefaultConfig();
        });
    }
}
