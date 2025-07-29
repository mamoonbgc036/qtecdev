<?php
namespace Tests\Feature\V1;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_booking()
    {
        $user    = User::factory()->create();
        $service = Service::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/v1/booking', [
            'service_id'   => $service->id,
            'booking_date' => now()->addDays(1)->toDateString(),
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => ['id', 'service', 'user', 'booking_date'],
            ]);
    }

    public function test_user_can_view_own_bookings()
    {
        $user    = User::factory()->create();
        $booking = Booking::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->getJson('/api/v1/booking');

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $booking->id]);
    }
}
