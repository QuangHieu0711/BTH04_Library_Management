
@extends('layouts.app')

@section('title', 'SỬA PHIẾU MƯỢN')

@section('content')
    <div class="container">
        <h1></h1>
        <form action="{{ route('borrow.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="reader_id"><b>Tên Độc Giả:</b></label>
                <select name="reader_id" id="reader_id" class="form-control" required>
                    @foreach($readers as $reader)
                        <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>{{ $reader->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="book_id"><b>Tên Sách:</b></label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="borrow_date"><b>Ngày Mượn:</b></label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{ $borrow->borrow_date }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="return_date"><b>Ngày Trả:</b></label>
                <input type="date" class="form-control" id="return_date" name="return_date" value="{{ $borrow->return_date }}">
            </div>
            <br>

            <div class="d-flex justify-content-between">
                <a href="{{ route('borrow.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left-circle-fill"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-floppy"></i> Lưu
                </button>
            </div>
        </form>
    </div>
@endsection