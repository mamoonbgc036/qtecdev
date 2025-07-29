<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBookingRequest;
use App\Http\Resources\V1\Booking\BookingResource;
use App\Repositories\V1\BookingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $bookingService;
    public function __construct(BookingRepository $booking_repository)
    {
        $this->bookingService = $booking_repository;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            if ($request->user()->isAdmin()) {
                $bookings = $this->bookingService->getAll()->load(['user', 'service']);
            } else {
                $bookings = $this->bookingService->getBasedOnUser($request->user());
            }
            return response()->json([
                'success' => true,
                'data'    => BookingResource::collection($bookings),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve bookings',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
    public function store(StoreBookingRequest $request): JsonResponse
    {
        try {
            $booking = $this->bookingService->create(
                $request->user(),
                $request->validated()
            );

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'data'    => new BookingResource($booking->load(['service', 'user'])),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create booking',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
