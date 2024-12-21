@extends('layouts.app')
@section('title', 'Danh sách Book')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>Quantity</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>

            
        @foreach ($books as $index => $book)
        <tr>
            <!-- Chỉ số bắt đầu từ 1 -->
            <td>{{ $books->firstItem() + $index }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->quantity }}</td>
            <td>
                <!-- Liên kết đến form tạo sách -->
                <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm</a>

                <!-- Liên kết đến form sửa sách -->
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Sửa</a>

                <!-- Form xóa sách -->
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>
@endsection
