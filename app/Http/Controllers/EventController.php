<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Type;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();
        return view('events.create')->with(['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request): \Illuminate\Http\RedirectResponse
    {

        $image = $request->file('image')->store('images', 'public');

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'image' => $image,
        ]);

        session()->flash('status', 'Event was created!');

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show')->with(['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $types = Type::all();
        return view('events.edit')->with(['event' => $event, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'type_id' => $request->type_id,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $event->update([
                'image' => $image,
            ]);
        }

        session()->flash('status', 'Event was updated!');

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {

        // delete image
        $image_path = public_path() . '/storage/' . $event->image;
        unlink($image_path);

        $event->delete();

        session()->flash('status', 'Event was deleted!');

        return redirect()->route('home');
    }
}
