<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\House;
use Illuminate\Support\Carbon;
use App\Exceptions\BookingUnavailableException; // Custom exception

class BookingService
{
    /**
     * Calculates booking details like number of nights and total cost.
     *
     * @param House $house
     * @param Carbon $checkInDate
     * @param Carbon $checkOutDate
     * @return array
     * @throws \InvalidArgumentException
     */
    public function calculateBookingDetails(House $house, Carbon $checkInDate, Carbon $checkOutDate): array
    {
        if ($checkOutDate->lte($checkInDate)) {
            throw new \InvalidArgumentException('Check-out date must be after check-in date.');
        }

        $noNights = $checkOutDate->diffInDays($checkInDate);
        if ($noNights <= 0) {
            throw new \InvalidArgumentException('Booking must be for at least one night.');
        }

        $pricePerNight = $house->price; // Or $house->price_per_night
        if (!$pricePerNight || !is_numeric($pricePerNight)) {
            throw new \RuntimeException('Pricing information for this property is unavailable.');
        }

        $totalCost = $noNights * $pricePerNight;
        $discount = 0; // Implement discount logic if needed
        $finalCost = $totalCost - $discount;

        return [
            'no_nights' => $noNights,
            'total_cost' => $finalCost,
            'discount' => $discount,
        ];
    }

    /**
     * Checks if the property is available for the given dates.
     *
     * @param int $houseId
     * @param Carbon $checkInDate
     * @param Carbon $checkOutDate
     * @return bool
     */
    public function isHouseAvailable(int $houseId, Carbon $checkInDate, Carbon $checkOutDate): bool
    {
        return !Booking::where('house_id', $houseId)
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where('check_in', '<', $checkOutDate->toDateString())
                      ->where('check_out', '>', $checkInDate->toDateString());
            })
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();
    }

    /**
     * Creates a new booking.
     *
     * @param array $data (Validated data from StoreBookingRequest)
     * @return Booking
     * @throws BookingUnavailableException
     * @throws \RuntimeException
     */
    public function createBooking(array $validatedData): Booking
    {
        $house = House::findOrFail($validatedData['house_id']);
        $checkInDate = $validatedData['check_in_date']; // Already Carbon objects from StoreBookingRequest
        $checkOutDate = $validatedData['check_out_date'];

        if (!$this->isHouseAvailable($house->id, $checkInDate, $checkOutDate)) {
            throw new BookingUnavailableException('Sorry, this property is not available for the selected dates.');
        }

        $bookingDetails = $this->calculateBookingDetails($house, $checkInDate, $checkOutDate);

        $booking = new Booking();
        $booking->house_id = $house->id;
        $booking->customer_name = $validatedData['customer_name'];
        $booking->customer_phone = $validatedData['customer_phone'];
        $booking->customer_email = $validatedData['customer_email'];
        $booking->check_in = $checkInDate->toDateString();
        $booking->check_out = $checkOutDate->toDateString();
        $booking->no_nights = $bookingDetails['no_nights'];
        $booking->discount = $bookingDetails['discount'];
        $booking->total_cost = $bookingDetails['total_cost'];
        $booking->note = $validatedData['note'] ?? null;
        $booking->status = 'pending';
        $booking->created_by = null; // For website bookings

        $booking->save();

        // Consider dispatching an event here instead of direct mail sending
        // event(new BookingCreated($booking));

        return $booking;
    }
}