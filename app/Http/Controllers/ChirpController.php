<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->get();
        return view('home', ['chirps'=> $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required'=> 'Please write a chrip!',
            'message.max' => 'Chirp must be 255 characters or less.',
        ]);
        Chirp::create($validated);
        return redirect()->route('home')->with('success', 'Your chirp is posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chirp = Chirp::findOrFail($id);
        return view('chirps.edit', ['chirp' => $chirp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $chirp = Chirp::findOrFail($id);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required'=> 'Please write a chrip!',
            'message.max' => 'Chirp must be 255 characters or less.',
        ]);
        $chirp->update($validated);

        return redirect()->route('home')->with('success', 'Chirp updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $chirp = Chirp::findOrFail($id);
        $chirp->delete();
        //$this->authorize('delete', $chirp);
        return redirect()->route('home')->with('success', 'Chirp deleted successfully!');
    }
}









