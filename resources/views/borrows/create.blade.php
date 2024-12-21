@extends('layouts.app')

@section('title', 'Thêm phiếu mượn mới')

@section('content')
<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">Thêm phiếu mượn mới</div>
                <div class="card-body">
                    <form action="{{ route('borrow.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reader_id" class="form-label">Tên độc giả</label>
                            <select name="reader_id" id="reader_id" class="form-control" required>
                                <option value="">Chọn độc giả</option>
                                @foreach($readers as $reader)
                                    <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="book_id" class="form-label">Tên sách</label>
                            <select name="book_id" id="book_id" class="form-control" required>
                                <option value="">Chọn sách</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="borrow_date" class="form-label">Ngày mượn</label>
                            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="return_date" class="form-label">Ngày trả</label>
                            <input type="date" name="return_date" id="return_date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{ route('borrow.index') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection