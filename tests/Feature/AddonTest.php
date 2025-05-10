<?php

namespace Tests\Feature;

use App\Services\Interfaces\AddonConfigServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddonTest extends TestCase
{
    use RefreshDatabase;

    public function test_manifest_endpoint_returns_correct_structure()
    {
        $response = $this->get('/manifest.json');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'version',
                'description',
                'name',
                'resources',
                'types',
                'catalogs',
                'idPrefixes',
            ]);
    }

    public function test_catalog_endpoint_returns_metas()
    {
        $response = $this->get('/catalog/movie/tt123.json');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'metas' => [
                    '*' => [
                        'id',
                        'name',
                        'year',
                        'poster',
                        'posterShape',
                        'banner',
                        'isFree',
                        'type',
                    ]
                ]
            ]);
    }

    public function test_meta_endpoint_returns_meta()
    {
        $response = $this->get('/meta/movie/tt123.json');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'year',
                'poster',
                'posterShape',
                'banner',
                'isFree',
                'type',
            ]);
    }

    public function test_stream_endpoint_returns_stream()
    {
        $response = $this->get('/stream/movie/tt123.json');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'streams' => [
                    '*' => [
                        'availability',
                        'url',
                        'name',
                        'title',
                        'quality',
                        'subtitles',
                        'externalUrl',
                        'behaviorHints',
                    ]
                ]
            ]);
    }

    public function test_subtitles_endpoint_returns_subtitles()
    {
        $response = $this->get('/subtitles/movie/tt123.json');

        $response->assertStatus(200)
            ->assertJson([]);
    }

    public function test_config_parameter_affects_response()
    {
        $config = 'test-config';
        
        $this->mock(AddonConfigServiceInterface::class, function ($mock) use ($config) {
            $mock->shouldReceive('resolve')
                ->with($config)
                ->once()
                ->andReturn($this->app->make(AddonConfigServiceInterface::class)->getDefaultConfig());
        });

        $response = $this->get("/{$config}/manifest.json");

        $response->assertStatus(200);
    }
} 