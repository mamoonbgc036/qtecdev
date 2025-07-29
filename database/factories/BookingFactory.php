<?php
namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'user_id'      => User::factory(),
            'service_id'   => Service::factory(),
            'booking_date' => now()->addDays(rand(1, 10)),
            'status'       => 'pending',
        ];
    }
}
