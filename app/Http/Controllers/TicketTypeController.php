<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('ticket_types.create', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        TicketType::create($request->all());

        return redirect()->route('events.index')->with('success', 'Ticket Type Added!');
    }

}
