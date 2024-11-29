<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return Book::with(['author', 'genre'])->get();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        return Book::with(['author', 'genre'])->findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'publication_year' => 'required|integer|digits:4',
            'price' => 'required|numeric|min:0',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

       
        return Book::create($validated);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $book = Book::findOrFail($id);

       
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'publication_year' => 'integer|digits:4',
            'price' => 'numeric|min:0',
            'author_id' => 'exists:authors,id',
            'genre_id' => 'exists:genres,id',
        ]);

        
        $book->update($validated);

        
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $book = Book::findOrFail($id);

       
        $book->delete();

       
        return response()->noContent();
    }
}
