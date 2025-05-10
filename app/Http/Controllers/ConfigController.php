<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AddonConfigServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfigController extends Controller
{
    public function __construct(
        private readonly AddonConfigServiceInterface $configService
    ) {
    }

    public function edit(?string $config = null)
    {
        $addonConfig = $this->configService->resolve($config);

        return Inertia::render('Config', [
            'config' => [
                'name' => $config,
                'apiKey' => $addonConfig->apiKey,
                'region' => $addonConfig->region,
                'language' => $addonConfig->language,
            ]
        ]);
    }

    public function update(Request $request, ?string $config = null)
    {
        $validated = $request->validate([
            'apiKey' => 'required|string|max:255',
            'region' => 'required|string|in:US,UK,EU,ASIA',
            'language' => 'required|string|in:en,es,fr,de',
        ]);

        // TODO: Implement config saving logic
    }
} 
