<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    //Trang chủ
    public function home()
    {
        return view('home');
    }
    //Hiển thị danh sách các độc giả
    public function index(Request $request)
    {
        // Lấy danh sách độc giả sắp xếp giảm dần theo id và phân trang
        $readers = Reader::orderBy('id', 'desc')->paginate(12);

        // Truyền thêm số trang hiện tại cho View
        $page = $request->input('page', 1); // Mặc định là trang 1 nếu không có tham số

        return view('readers.index', compact('readers', 'page'));
    }


    //Hiển thị form tạo mới độc giả
    public function create()
    {
        return view("readers.create");
    }

    //Lưu độc giả mới
    public function store(Request $request)
    {
        // Xóa trường _token khỏi dữ liệu
        $data = $request->except('_token');

        // Validating
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:11',
        ]);

        // Tạo mới độc giả mà không có _token
        Reader::create($data);

        // Chuyển hướng về trang danh sách độc giả
        return redirect()->route('reader.index')->with('success', 'Bạn đã thêm độc giả thành công!');
    }

    //Tìm kiếm độc giả theo tên
    public function show(string $name)
    {
        $reader = Reader::where('name', 'like', '%' . $name . '%')->firstOrFail();
        return view('readers.show', compact('reader'));
    }

    //Hiển thị form sửa thông tin độc giả
    public function edit(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

    //Cập nhật thông tin độc giả
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $reader = Reader::findOrFail($id);
        $reader->update($request->only(['name', 'birthday', 'address', 'phone']));

        return redirect()->route('reader.index')->with('success', 'Thông tin độc giả đã được cập nhật thành công.');
    }

    public function destroy(string $id)
    {
        $reader = Reader::find($id);
    
        if (!$reader) {
            return redirect()->route('reader.index')->with('error', 'Không tìm thấy độc giả!');
        }
    
        $reader->delete();
        return redirect()->route('reader.index')->with('success', 'Xóa độc giả thành công!');
    }
}
