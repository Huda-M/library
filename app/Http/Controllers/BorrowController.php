<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // BorrowController.php
public function index()
{
    $borrows = Auth::user()->borrows()->with('book')->paginate(10);
    return view('borrows.index', compact('borrows'));
}
public function adminBorrows()
{
    $borrows = Borrow::with([
        'book' => function($query) {
            $query->withTrashed();
        },
        'user' => function($query) {
            $query->withTrashed(); // تضمين المستخدمين المحذوفين
        }
    ])
    ->withTrashed()
    ->paginate(12);

    return view('books.borrowed_books', compact('borrows'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $bookId)
{
    try {
        $book = Book::findOrFail($bookId);

        // تحقق من توفر نسخ
        if ($book->available_copies < 1) {
            return back()->with('error', 'No available copies to borrow.');
        }

        // إنشاء سجل الاستعارة بدون admin_id
        Borrow::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'status' => 'borrowed',
            'borrow_date' => now(),
            'return_date' => now()->addWeeks(2),
        ]);

        // تقليل عدد النسخ المتاحة
        $book->decrement('available_copies');

        return back()->with('success', 'Book borrowed successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
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
        'status' => 'returned', // تأكدي من تحديث الحالة هنا
        'actual_return_date' => now(),
    ]);

    $book->increment('available_copies');

    return redirect()->route('my.books')->with('success', 'Book returned successfully');
}
}
