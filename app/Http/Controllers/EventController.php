<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::get();

        return response()->json([
            'status' => 'successful',
            'description' => 'Events Retreived Sucessfully',
            'data' => $data,
        ], 200);

        //
    }
    public function indexByUser($id)
    {
        $data = Event::where('user_id', $id)->get();

        return response()->json([
            'status' => 'successful',
            'description' => 'User Events Retreived Sucessfully',
            'data' => $data,
        ], 200);

        //
    }

    // return AlbumResource::collection(Album::where('user_id', $request->user()->id)->paginate());

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        // $id = Auth::user()->id;

        $data = Event::create($request->all());
        // $data['user_id'] = $request->user()->id;

        return response()->json([
            'status' => 'successful',
            'description' => 'Event Created Sucessfully',
            'data' => $data,
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, Event $event)
    {
        $event->update($request->all());

        return response()->json([
            'status' => 'successful',
            'description' => 'Event Updated Sucessfully',
            'data' => $event,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response('', 204);

    }
}
