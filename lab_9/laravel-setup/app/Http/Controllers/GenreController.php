<?php

namespace App\Http\Controllers;

use App\Models\Genre; 
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return Genre::all();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        return Genre::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        
        return Genre::create($validated);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $genre = Genre::findOrFail($id);

       
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
        ]);

       
        $genre->update($validated);

       
        return $genre;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $genre = Genre::findOrFail($id);

       
        $genre->delete();

       
        return response()->noContent();
    }
}
