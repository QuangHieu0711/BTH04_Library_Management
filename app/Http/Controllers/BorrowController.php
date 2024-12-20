<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
   //Trang chủ
    public function index()
    {
        //
        return view('home');  
    }

    //Hiển thị danh sách các phiếu mượn
    public function create()
    {
        // 
        $readers = Borrow::all();
        return view("borrow.index", compact("borrows"));
    }

   //Hiển thị form tạo mới phiếu mượn

    public function store(Request $request)
    {
        return view("borow.create");
    }

    //Lưu phiếu mượn mới
    public function strore(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);
    
        // Tạo mới phiếu mượn trong CSDL
        Borrow::create($request->all());  
    
        // Chuyển hướng về trang danh sách phiếu mượn
        return redirect()->route('borrow.index')->with('success', 'Bạn đã thêm phiếu mượn thành công!');
    }

    //Tìm kiếm phiếu mượn theo tên độc giả
    public function searchByReaderName(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
    
        $name = $request->input('name');
        $borrows = Borrow::whereHas('reader', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->get();
    
        return view('borrow.index', compact('borrows'));
    }

    //Hiển thị form sửa thông tin phiếu mượn
    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        return view('borrow.edit', compact('borrow'));
    }

    //Cập nhật thông tin phiếu mượn
    public function update(Request $request, string $id)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);
    
        $borrow = Borrow::findOrFail($id);
        $borrow->update($request->all());
    
        return redirect()->route('borrow.index')->with('success', 'Cập nhật thông tin phiếu mượn thành công!'); 
    }

    //Xóa phiếu mượn
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return redirect()->route('borrow.index')->with('success', 'Bạn đã xóa phiếu mượn thành công!');
    }
}
