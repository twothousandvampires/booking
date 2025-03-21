<?php

namespace Tests\Feature;

use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_resource_api()
    {
        $response = $this->postJson('/api/resources', [
            'name' => 'name',
            'type' => 'type',
            'description' => 'description',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'name' => 'name',
                     'type' => 'type',
                     'description' => 'description',
                 ]);
    }

    public function test_get_all_resources()
    {
        $resources = Resource::factory()->count(3)->create();

        $response = $this->getJson('/api/resources');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'type',
                    'description',
                ],
            ],
        ]);

        $response->assertJsonCount(3, 'data');

        foreach ($resources as $resource) {
            $response->assertJsonFragment([
                'id' => $resource->id,
                'name' => $resource->name,
                'type' => $resource->type,
                'description' => $resource->description,
            ], 'data');
        }

        foreach ($resources as $resource) {
            Resource::find($resource->id)->delete();
        }
    }
}
