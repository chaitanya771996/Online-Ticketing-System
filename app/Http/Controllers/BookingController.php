<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // Fetch all bookings made by the authenticated user (attendee)
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    // Show booking details (optional)
    public function show(Booking $booking)
    {
        // $this->authorize('view', $booking); // Ensure user can view the booking
        if(auth()->user()->role === 'organizer') {
            $bookings = Booking::where('user_id', Auth::id())->get();
        }
        return view('bookings.show', compact('booking'));
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'tickets_quantity' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($request->event_id);
        
        // Check if enough tickets are available
        if ($event->ticket_availability < $request->tickets_quantity) {
            return redirect()->back()->with('error', 'Not enough tickets available for this event.');
        }

        // Prevent duplicate bookings
        // if (Booking::where('user_id', Auth::id())->where('event_id', $event->id)->exists()) {
        //     return redirect()->back()->with('error', 'You have already booked this event.');
        // }

        // Create the booking
        Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'tickets_booked' => $request->tickets_quantity,
        ]);

        // Reduce the available tickets count
        $event->decrement('ticket_availability', $request->tickets_quantity);

        return redirect()->back()->with('success', 'Booking successful!');
    }

}
