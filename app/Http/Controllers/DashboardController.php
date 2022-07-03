<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $userId = auth()->id();
        $events = Event::where('user_id', '=', $userId)->get();

        return view('dashboard', [
            'events' => $events,
        ]);
    }

    public function showEventForm()
    {
        return view('event-create');
    }

    public function createEvent(Request $request)
    {
        $userId = $request->user()->id;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'event_date' => 'required',
            'user_id' => ['integer', $userId],
            'is_active' => 'nullable',
            'access' => 'nullable',
        ]);
        //dd($validatedData);

        Event::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'event_date' => $validatedData['event_date'],
            'user_id' => $userId,
            'is_active' => $validatedData['is_active'],
            'access' => $validatedData['access'],
        ]);

        return redirect('/dashboard');
    }

    public function editEvent(Event $event)
    {
        $data = Event::find($event->id);

        // dd($event->id);
        return view('event-edit', compact('event'));

    }


    public function updateEvent(Request $request, Event $event)
    {
        $userId = $request->user()->id;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'event_date' => 'required',
            'user_id' => ['integer', $userId],
            'is_active' => 'nullable',
            'access' => 'nullable',
        ]);
        //dd($validatedData);

        $event->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'event_date' => $validatedData['event_date'],
            'user_id' => $userId,
            'is_active' => $validatedData['is_active'],
            'access' => $validatedData['access'],
        ]);

        return redirect('/dashboard');
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();

        return redirect('dashboard');

    }


     public function eventisOnline(Request $request, Event $event)
    {

        return view('event-show', compact('event'));
    }


}
