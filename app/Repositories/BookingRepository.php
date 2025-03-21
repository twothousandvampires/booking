<?php 

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    protected $model;

    public function __construct(Booking $booking)
    {
        $this->model = $booking;
    }

    public function create(array $data): Booking
    {
        return $this->model->create($data);
    }

    public function  getBookingsByResourceId(int $resourceId)
    {
        return $this->model->where('resource_id', $resourceId)->get();
    }

    public function delete(int $id): bool
    {
        $booking = $this->model->find($id);

        if($booking) {
            $booking->delete();
            return true;
        }
        else {
            return false;
        }
    }
}