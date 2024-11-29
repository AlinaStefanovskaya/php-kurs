<?php

namespace App\Http\Controllers;

use App\Models\Author; // Импорт модели Author
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Author::all();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Author::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'nullable|string',
        ]);

        return Author::create($validated);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'biography' => 'nullable|string',
        ]);

        $author->update($validated);

        return $author;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return response()->noContent();
    }
}
