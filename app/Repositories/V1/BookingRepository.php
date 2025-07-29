<?php
namespace App\Repositories\V1;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    public function getAll(): Collection
    {
        return Booking::with(['user', 'service'])->get();
    }

    public function getBasedOnUser(User $authedUser): Collection
    {
        return $authedUser->bookings()->with('service')->get();
    }

    public function getByUser(User $user): Collection
    {
        return $user->bookings()->with('service')->get();
    }

    public function create(User $user, $requestedData): Booking
    {
        $booked = $user->bookings()->create($requestedData);
        return $booked;
    }

    public function findById(int $id): ?Booking
    {
        return Booking::with(['user', 'service'])->find($id);
    }
}
