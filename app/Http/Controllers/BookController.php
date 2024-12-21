<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    
    public function home()
    {
        return view('home');  
    }
    public function index()
    {
        $books = Book::paginate(10); 
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Sách đã được thêm thành công!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'year' => 'required|integer',
        'quantity' => 'required|integer',
    ]);

    $book = Book::findOrFail($id);
    $book->update([
        'name' => $request->name,
        'author' => $request->author,
        'category' => $request->category,
        'year' => $request->year,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('book.index')->with('success', 'Cập nhật sách thành công!');
}

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
    
        // Xóa chính book
        $book->delete();
    
        return redirect()->route('book.index')->with('success', 'Sách và dữ liệu liên quan đã được xóa!');
    }
    
}

