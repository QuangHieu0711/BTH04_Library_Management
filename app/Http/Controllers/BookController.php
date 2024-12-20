<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function home()
     {
         return view('home');  
     }
    public function index()
    {
        $books = Book::all();
        return view("book.index", compact("books"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("book.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category'=> 'required|string|max:255',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        Book::create($request->all());
        return redirect()->route('book.index')->with('success','Bạn đã thêm sách thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'category'=> 'required|string|max:255',
            'year'=> 'required|integer',
            'quantity'=> 'required|integer',
        ]);
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('book.index')->with('success','Cập nhật thông tin sách thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.index')->with('success','Xóa sách thành công!');
    }
}
