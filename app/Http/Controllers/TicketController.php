<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeByEvent(StoreTicketRequest $request)
    {

        $data = Ticket::create($request->all());
        $tickets = Ticket::all();

        return response()->json([
            'status' => 'successful',
            'description' => 'Ticket Created',
            'data' => $data,
            'all_tickets' => $tickets,
        ], 200);
    }

    public function showTicketForm()
    {
        return view('ticket-create');
    }

    public function createTicket(Request $request, Event $event)
    {
        $userId = $request->user()->id;
        $eventId = $event->id;

        Ticket::create([
            'event_id' => $eventId,
            'user_id' => $userId,
        ]);

        return redirect()->route('event.live', $eventId);
    }

    public function updateTicket(Request $request, $ticketId)
    {

        // dd($ticketId);
        Ticket::where('id', $ticketId)->update(['is_valid' => 'Invalid']);

        return Redirect::back();

    }
}
