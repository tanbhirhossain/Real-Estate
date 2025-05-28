<?php

namespace App\Http\Controllers\FRONT;

use App\Models\Booking;
use App\Models\House;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Mail\NewBookingNotification;

class BookingController extends Controller
{
    public function book_room(Request $request)
    {
        $validated = $request->validate([
            'house_id' => 'required|exists:houses,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'num_adults' => 'required|integer|min:1',
            'num_children' => 'nullable|integer|min:0',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string'
        ]);

        // Calculate number of nights and total cost
        $checkIn = Carbon::parse($validated['check_in_date']);
        $checkOut = Carbon::parse($validated['check_out_date']);
        $nights = $checkOut->diffInDays($checkIn);
        
        $house = House::findOrFail($validated['house_id']);
        $pricePerNight = $house->price;
        $totalCost = $nights * $pricePerNight;

        // Check for availability
        $isAvailable = Booking::where('house_id', $validated['house_id'])
            ->where(function($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function($q) use ($checkIn, $checkOut) {
                          $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                      });
            })
            ->where('status', '!=', 'cancelled')
            ->doesntExist();

        if (!$isAvailable) {
            return back()->withErrors(['dates' => 'The property is not available for the selected dates.']);
        }

        // Create the booking
        $booking = Booking::create([
            'house_id' => $validated['house_id'],
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'],
            'customer_phone' => $validated['phone'],
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'no_nights' => $nights,
            'total_cost' => $totalCost,
            'note' => $validated['message'] ?? null,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // // Send confirmation email to customer
        // Mail::to($validated['email'])->send(new BookingConfirmation($booking));
        
        // // Send notification to admin/realtor
        // Mail::to(config('mail.admin_email'))->send(new NewBookingNotification($booking));

        return redirect()->back()->with('success', 'Your booking request has been submitted successfully! We will contact you shortly.');
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'house_id' => 'required|exists:houses,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in'
        ]);

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);

        $isAvailable = Booking::where('house_id', $request->house_id)
            ->where(function($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function($q) use ($checkIn, $checkOut) {
                          $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                      });
            })
            ->where('status', '!=', 'cancelled')
            ->doesntExist();

        return response()->json(['available' => $isAvailable]);
    }
}