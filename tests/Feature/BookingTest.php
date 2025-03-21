<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_booking_api()
    {
        $resource = Resource::factory()->create();
        $user = User::factory()->create();
        $start = now()->toDateTimeString();
        $end = now()->addHours(2)->toDateTimeString();

        $response = $this->postJson('/api/bookings', [
            'resource_id' => $resource->id,
            'user_id' => $user->id,
            'start_time' => $start,
            'end_time' => $end,
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'resource_id' => $resource->id,
                     'user_id' => $user->id,
                     'start_time' => $start,
                     'end_time' => $end,
                 ]);
    }

    public function test_cancel_booking()
    {
        $resource = Resource::factory()->create();
        $user = User::factory()->create();

        $booking = Booking::factory()->create([
            'resource_id' => $resource->id,
            'user_id' => $user->id,
        ]);

        $this->deleteJson("/api/bookings/{$booking->id}");

        $this->assertDatabaseMissing('bookings', [
            'id' => $booking->id,
        ]);
    }
    public function test_get_all_bookings_for_resource()
    {
        $resource = Resource::factory()->create();

        Booking::factory()->count(3)->create([
            'resource_id' => $resource->id,
        ]);

        $response = $this->getJson("/api/resources/$resource->id/bookings");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [ // Массив бронирований
                    'id',
                    'resource_id',
                    'user_id',
                    'start_time',
                    'end_time',
                ],
            ],
        ]);

        $response->assertJsonCount(3, 'data');
    }
}
