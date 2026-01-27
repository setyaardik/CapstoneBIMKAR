<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
	$events = Event::all();
	return view('admin.event.index', compact('events'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Kategori::all();
        return view('admin.event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal_waktu' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategoris,id',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('events', 'public');
        // hasil: events/konser_rock.jpg
        $validatedData['gambar'] = $path;
    }

    $validatedData['user_id'] = auth()->id();

    Event::create($validatedData);

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Event berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = Kategori::all();
        $tickets = $event->tikets;

        return view('admin.event.show', compact('event', 'categories', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = Kategori::all();
        return view('admin.event.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $event = Event::findOrFail($id);

    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal_waktu' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategoris,id',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('gambar')) {

        // hapus gambar lama (opsional tapi bagus)
        if ($event->gambar && Storage::disk('public')->exists($event->gambar)) {
            Storage::disk('public')->delete($event->gambar);
        }

        $path = $request->file('gambar')->store('events', 'public');
        $validatedData['gambar'] = $path;
    }

    $event->update($validatedData);

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Event berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
