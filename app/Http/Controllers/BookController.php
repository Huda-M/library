<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(12);
        return view('books.view_books', ['books' => $books]);
    }

    public function show(string $id)
    {
        $book = Book::with('user')->findOrFail($id);
        return $book;
    }

    public function store(StoreBookRequest $request)
    {
        $photoPath = $request->file('photo')->store('public/books');

        $book = Book::create([
            ...$request->validated(),
            'photo' => $photoPath,
            'category_id' => $request->category_id
        ]);

        return $book;
    }

    public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($book->photo && Storage::exists($book->photo)) {
                Storage::delete($book->photo);
            }
            $data['photo'] = $request->file('photo')->store('public/books');
        }

        $book->update($data);
        return response()->json(['message' => 'Book updated successfully']);
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        if ($book->photo && Storage::exists($book->photo)) {
            Storage::delete($book->photo);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }

    public function create()
    {
        return view('books.create');
    }

public function edit(string $id)
{
    $book = Book::findOrFail($id);
    return view('books.edit', compact('book'));
}
}
