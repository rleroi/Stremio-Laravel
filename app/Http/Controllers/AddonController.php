<?php

namespace App\Http\Controllers;

use App\Http\Resources\MetaCollection;
use App\Http\Resources\MetaResource;
use App\Http\Resources\StreamResource;
use App\Services\Interfaces\AddonConfigServiceInterface;
use App\Services\Interfaces\AddonManifestServiceInterface;
use App\Services\Interfaces\CatalogServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class addonController
 * @package App\Http\Controllers
 */
class AddonController extends Controller
{
    public function __construct(
        private readonly AddonConfigServiceInterface $configService,
        private readonly AddonManifestServiceInterface $manifestService,
        private readonly CatalogServiceInterface $catalogService
    ) {
    }

    /**
     * Summarized collection of meta items. Catalogs are displayed on the Stremio's Board, Discover and Search.
     */
    public function catalog(string $type, string $id, ?string $extra = null, ?string $config = null): JsonResponse
    {
        $addonConfig = $this->configService->resolve($config);

        return response()->json([
            'metas' => [
                [
                    'id' => 'tt123',
                    'name' => 'Example Movie',
                    'type' => 'movie',
                    'poster' => 'https://example.com/poster.jpg',
                    'posterShape' => 'portrait',
                    'banner' => 'https://example.com/banner.jpg',
                    'logo' => 'https://example.com/logo.png',
                    'background' => 'https://example.com/background.jpg',
                    'year' => 2024,
                    'isFree' => true,
                    'genres' => ['Action', 'Adventure'],
                    'imdbRating' => 8.5,
                    'released' => '2024-01-01',
                    'description' => 'A sample movie for Stremio.',
                    'runtime' => '120 min',
                    'trailer' => 'https://example.com/trailer.mp4',
                ]
            ]
        ]);
    }

    /**
     * Detailed description of meta item. This description is displayed when the user selects an item form the catalog.
     */
    public function meta(string $type, string $id, ?string $extra = null, ?string $config = null): JsonResponse
    {
        $addonConfig = $this->configService->resolve($config);

        return response()->json([
            'id' => 'tt123',
            'name' => 'Example Movie',
            'type' => 'movie',
            'poster' => 'https://example.com/poster.jpg',
            'posterShape' => 'portrait',
            'banner' => 'https://example.com/banner.jpg',
            'logo' => 'https://example.com/logo.png',
            'background' => 'https://example.com/background.jpg',
            'year' => 2024,
            'isFree' => true,
            'genres' => ['Action', 'Adventure'],
            'imdbRating' => 8.5,
            'released' => '2024-01-01',
            'description' => 'A sample movie for Stremio.',
            'runtime' => '120 min',
            'trailer' => 'https://example.com/trailer.mp4',
            'rating' => 8.5,
            'videos' => [
                [
                    'id' => 'tt123_1',
                    'name' => 'Trailer',
                    'type' => 'trailer',
                    'url' => 'https://example.com/trailer.mp4',
                    'thumbnail' => 'https://example.com/trailer-thumb.jpg',
                ]
            ]
        ]);
    }

    /**
     * Tells Stremio how to obtain the media content. It may be torrent info hash, HTTP URL, etc
     */
    public function stream(string $type, string $id, ?string $extra = null, ?string $config = null): JsonResponse
    {
        $addonConfig = $this->configService->resolve($config);

        return response()->json([
            'streams' => [[
                'availability' => 1,
                'url' => 'https://example.com/movie.mp4',
                'externalUrl' => 'https://imdb.com/title/tt123',
                'name' => '1080p',
                'title' => '1080p',
                'quality' => '1080p',
                'behaviorHints' => [
                    'notWebReady' => false,
                    'bingeGroup' => 'season1',
                ],
                'subtitles' => [
                    [
                        'id' => 'en',
                        'url' => 'https://example.com/subtitles/en.vtt',
                        'language' => 'English',
                        'lang' => 'en',
                        'langCode' => 'en',
                    ]
                ]
            ]]
        ]);
    }

    /**
     * Subtitles resource for the chosen media.
     */
    public function subtitles(string $type, string $id, ?string $extra = null, ?string $config = null): JsonResponse
    {
        $addonConfig = $this->configService->resolve($config);

        return response()->json([
            'subtitles' => [
                [
                    'id' => 'en',
                    'url' => 'https://example.com/subtitles/en.vtt',
                    'language' => 'English',
                    'lang' => 'en',
                    'langCode' => 'en',
                ],
                [
                    'id' => 'es',
                    'url' => 'https://example.com/subtitles/es.vtt',
                    'language' => 'Spanish',
                    'lang' => 'es',
                    'langCode' => 'es',
                ]
            ]
        ]);
    }

    /**
     * Generate a manifest.json file
     */
    public function manifest(?string $config = null): JsonResponse
    {
        $addonConfig = $this->configService->resolve($config);
        return response()->json($this->manifestService->generate($addonConfig));
    }
}
