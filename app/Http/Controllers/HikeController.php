<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Location;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    public function index()
    {
        $hikes = Hike::with('location')->get();

        return view('hikes.index', compact('hikes'));
    }

    public function create()
    {
        $locations = Location::all();

        return view('hikes.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'difficulty' => 'required|string|max:50',
            'distance' => 'required|numeric|min:0',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Hike::create($validated);

        return redirect()
            ->route('hikes.index')
            ->with('success', 'Hike created successfully.');
    }

    public function show(Hike $hike)
    {
        $hike->load('location');

        return view('hikes.show', compact('hike'));
    }

    public function edit(Hike $hike)
    {
        $locations = Location::all();

        return view('hikes.edit', compact('hike', 'locations'));
    }

    public function update(Request $request, Hike $hike)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'difficulty' => 'required|string|max:50',
            'distance' => 'required|numeric|min:0',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $hike->update($validated);

        return redirect()
            ->route('hikes.index')
            ->with('success', 'Hike updated successfully.');
    }

    public function destroy(Hike $hike)
    {
        $hike->delete();

        return redirect()
            ->route('hikes.index')
            ->with('success', 'Hike deleted successfully.');
    }
}