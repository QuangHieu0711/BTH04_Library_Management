@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm mới Book</h1>
        <form action="{{ route('book.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Author</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Category</label>
                <textarea class="form-control" id="long_description" name="long_description"></textarea>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quanity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>


            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
