@extends('layouts.app')

@section('name', 'SỬA TÊN SÁCH')

@section('content')
    <div class="container">
        <h1></h1>
        <form action="{{ route('book.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"><b>NAME:</b></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="author"><b>Author:</b></label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="caregory"><b>CATEGORY:</b></label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $book->category }}" required>
            </div>
            <br>
            <div class="form-group">
            <label for="year"><b>YEAR:</b></label>
                <input type="text" class="form-control" id="year" name="year" value = "{{ $book->year }}" required>
            </div>
            <div class="form-group">
            <label for="quantity"><b>QUANTITY</b></label>
                <input type="text" class="form-control" id="quantity" name="quantity" value = "{{ $book->quantity }}" required>
            </div>

            <br>

            <div class="d-flex justify-content-between">
            <a href="{{ route('book.index') }}" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left-circle-fill"></i> Quay lại
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-floppy"></i> Lưu
            </button>
        </div>
            
        </form>
    </div>
@endsection
