<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = $this->bookingService->create($request->validated());
        return new BookingResource($booking);
    }

    public function getBookingsByResourceId(int $resourceId)
    {
        $bookings = $this->bookingService->getBookingsByResourceId($resourceId);
        return BookingResource::collection($bookings);  
    }
    
    public function destroy(int $id)
    {
        $result = $this->bookingService->delete($id);
        return response()->json(['message' => $result ? 'Бронирование отменено' : 'бронирование не найдено']);
    }
}
