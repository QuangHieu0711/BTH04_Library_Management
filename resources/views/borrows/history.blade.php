@extends('layouts.app')

@section('title', 'Lịch sử mượn trả sách')

@section('content')
<div class="container-xl">
    <h1>Lịch sử mượn trả sách của {{ $reader->name }}</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->id }}</td>
                    <td>{{ $borrow->book->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>
                        @if ($borrow->status == 0)
                        <span class="btn btn-borrowing">Đang mượn</span>
                        @else
                        <span class="btn btn-returned"><i class="bi bi-check-circle"></i> Đã trả</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('borrow.index') }}" class="btn btn-primary">Quay lại</a>
    </div>
</div>
@endsection