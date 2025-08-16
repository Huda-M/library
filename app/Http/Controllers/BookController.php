<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(12);
        return view('books.view_books', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $photoPath = $request->file('photo')->store('books', 'public');
        Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
            'available_copies' => (int)$request->available_copies,
            'price' => (int)$request->price,
            'publish_year' => $request->publish_year,
            'photo' => $photoPath,
            'category_id' => (int)$request->category_id,
        ]);
        return redirect()->route('books.index')->with('success', 'Book added successfully!');

    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            if ($book->photo && Storage::disk('public')->exists($book->photo)) {
                Storage::disk('public')->delete($book->photo);
            }
        $data['photo'] = $request->file('photo')->store('books', 'public');
        }
        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(string $id)
{
    $book = Book::findOrFail($id);

    // حذف ناعم بدلاً من الحذف الفعلي
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Book deleted successfully');
}


    public function show(string $id)
    {
        $book = Book::with('user')->findOrFail($id);
        return $book;
    }




public function myBooks()
{
    $books = auth()->user()->activeBorrowedBooks()->paginate(12);
    return view('books.my_books', ['books' => $books]);
}








public function returnBook($bookId)
{
    $book = Book::findOrFail($bookId);
    $user = auth()->user();

    $borrow = Borrow::where('user_id', $user->id)
                    ->where('book_id', $bookId)
                    ->where('status', 'borrowed')
                    ->firstOrFail();

    $borrow->update([
        'status' => 'returned',
        'actual_return_date' => now(),
    ]);

    $book->increment('available_copies');

    return redirect()->route('my.books')->with('success', 'Book returned successfully');
}
}
