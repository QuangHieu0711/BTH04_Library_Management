@extends('layouts.app')

@section('title', 'Danh sách phiếu mượn (BORROW)')

@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title mt-4">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('borrow.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> <span>Thêm phiếu mượn</span></a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('borrow.searchByReaderName') }}" method="GET" class="d-flex">
                            <input type="text" name="name" class="form-control" placeholder="Tìm kiếm theo tên độc giả">
                            <button type="submit" class="btn btn-primary ms-2"><i class="bi bi-search"></i> Tìm kiếm</button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên độc giả</th>
                        <th>Tên sách</th>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>
                            <a href="{{ route('borrow.edit', $borrow->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Sửa</a>
                            <form action="{{ route('borrow.destroy', $borrow->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection