<?php

namespace Tests\Unit;

use App\Models\Booking;
use App\Models\Resource;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_create_booking()
    {
        $resource = Resource::factory()->create();
        $user = User::factory()->create();

        Booking::factory()->create([
            'resource_id' => $resource->id,
            'user_id' => $user->id,
            'start_time' => now(),
            'end_time' => now()->addHours(2),
        ]);

        $this->assertDatabaseHas('bookings', [
            'resource_id' => $resource->id,
            'user_id' => $user->id,
        ]);
    }
}