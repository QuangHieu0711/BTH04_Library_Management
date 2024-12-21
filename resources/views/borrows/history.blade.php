
@extends('layouts.app')

@section('title', 'Lịch sử mượn trả sách')

@section('content')
<div class="container-xl">
    <h1>Lịch sử mượn trả sách của {{ $reader->name }}</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
            <tr>
                <td>{{ $borrow->id }}</td>
                <td>{{ $borrow->book->name }}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->return_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection