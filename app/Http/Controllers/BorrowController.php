<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;


class BorrowController extends Controller
{
    // Hiển thị danh sách phiếu mượn
    public function index(Request $request)
    {
        // Lấy danh sách phiếu mượn sắp xếp giảm dần theo id và phân trang
        $borrows = Borrow::with('reader', 'book')->orderBy('id', 'asc')->paginate(12);

        // Truyền thêm số trang hiện tại cho View
        $page = $request->input('page', 1); // Mặc định là trang 1 nếu không có tham số

        return view('borrows.index', compact('borrows', 'page'));
    }

    // Hiển thị form tạo mới phiếu mượn
    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.create', compact('readers', 'books'));
    }

    // Lưu phiếu mượn mới
    public function store(Request $request)
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

    // Tìm kiếm phiếu mượn theo tên độc giả
    public function searchByReaderName(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $name = $request->input('name');
        $borrows = Borrow::whereHas('reader', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->get();

        return view('borrows.index', compact('borrows'));
    }

    // Hiển thị form sửa thông tin phiếu mượn
    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'readers', 'books'));
    }

    // Cập nhật thông tin phiếu mượn
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->update($validatedData);

        return redirect()->route('borrow.index')->with('success', 'Bạn đã cập nhật phiếu mượn thành công!');
    }

    // Xóa phiếu mượn
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return redirect()->route('borrow.index')->with('success', 'Bạn đã xóa phiếu mượn thành công!');
    }
    // Cập nhật trạng thái trả sách
    public function updateStatus($id)
{
    $borrow = Borrow::findOrFail($id);
    $borrow->return_date = now(); // Cập nhật ngày trả sách là ngày hiện tại
    $borrow->save();

    return redirect()->route('borrow.index')->with('success', 'Cập nhật trạng thái trả sách thành công!');
}
// Hiển thị lịch sử mượn sách của độc giả
public function history($reader_id)
{
    $reader = Reader::findOrFail($reader_id);
    $borrows = Borrow::where('reader_id', $reader_id)->with('book')->get();

    return view('borrows.history', compact('reader', 'borrows'));
}
}
