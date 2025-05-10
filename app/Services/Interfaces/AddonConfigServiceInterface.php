<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\AddonConfig;

interface AddonConfigServiceInterface
{
    public function resolve(?string $config): AddonConfig;
    public function getDefaultConfig(): AddonConfig;
    public function loadConfig(string $config): AddonConfig;
}
