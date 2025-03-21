<?php

namespace Tests\Unit;

use App\Models\Resource;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_resource()
    {
        $resource = Resource::factory()->create([
            'name' => 'random name',
            'type' => 'random type',
            'description' => 'random rescroption',
        ]);

        $this->assertDatabaseHas('resources', [
            'name' => 'random name',
            'type' => 'random type',
            'description' => 'random rescroption',
        ]);

        Resource::find($resource->id)->delete();
    }
}