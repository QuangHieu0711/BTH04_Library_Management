
@extends('layouts.app')

@section('title', 'Danh sách phiếu mượn (BORROW)')

@section('content')
<div class="container-xl">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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
            <div class="clearfix">
                <div class="pagination-wrapper" style="float: right;">
                    @if ($borrows->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($borrows->onFirstPage())
                        <li class="disabled"><span>&laquo;</span></li>
                        @else
                        <li><a href="{{ $borrows->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($borrows->links()->elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                        @foreach ($element as $page => $url)
                        @if ($page == $borrows->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                        @elseif ($page == 1 || $page == 2 || $page == 3 || $page == $borrows->lastPage() || $page == $borrows->lastPage() - 1 || $page == $borrows->lastPage() - 2)
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == 4)
                        <li class="disabled"><span>...</span></li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($borrows->hasMorePages())
                        <li><a href="{{ $borrows->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                        <li class="disabled"><span>&raquo;</span></li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection