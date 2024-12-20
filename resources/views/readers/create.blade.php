@extends('layouts.app')

@section('title', 'THÊM MỚI ĐỘC GIẢ')

@section('content')
<div class="container mt-4">
    <form action="{{ route('reader.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Tên độc giả:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="birthday">Ngày sinh:</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>
        <div class="form-group mb-3">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group mb-3">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('reader.index') }}" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left-circle-fill"></i> Quay lại
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-floppy"></i> Lưu
            </button>
        </div>

    </form>
</div>
@endsection