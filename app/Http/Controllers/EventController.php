<?php

namespace App\Http\Controllers;

use App\Models\Event; // Pastikan ini benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan ini benar
use Illuminate\Support\Str; // Tambahkan ini untuk Str::limit di view

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('start_date', 'asc')->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/event_photos');
            $data['photo'] = basename($photoPath);
        }

        Event::create($data);

        return redirect()->route('events.index')
                         ->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($event->photo) {
                Storage::delete('public/event_photos/' . $event->photo);
            }
            $photoPath = $request->file('photo')->store('public/event_photos');
            $data['photo'] = basename($photoPath);
        } else {
            // Jika tidak ada foto baru diupload, pertahankan foto lama
            unset($data['photo']);
        }

        $event->update($data);

        return redirect()->route('events.index')
                         ->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->photo) {
            Storage::delete('public/event_photos/' . $event->photo);
        }

        $event->delete();

        return redirect()->route('events.index')
                         ->with('success', 'Event berhasil dihapus!');
    }
}