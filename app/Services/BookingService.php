<?php

namespace App\Services;

use App\Repositories\BookingRepository;
use App\Models\Booking;

class BookingService
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function create(array $data): Booking
    {
        return $this->bookingRepository->create($data);
    }

    public function getBookingsByResourceId(int $resourceId)
    {
        return $this->bookingRepository->getBookingsByResourceId($resourceId);
    }

    public function delete(int $id): bool
    {
        return $this->bookingRepository->delete($id);
    }
}