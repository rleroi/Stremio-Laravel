<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\AddonConfig;

interface AddonManifestServiceInterface
{
    /**
     * Generate manifest based on configuration
     */
    public function generate(?AddonConfig $config = null): array;
} 