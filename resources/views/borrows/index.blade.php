@extends('layouts.app')

@section('title', 'QUẢN LÝ PHIẾU MƯỢN (BORROW)')

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
                </div>
            </div>
            <style>
                .table tbody tr {
                    padding: 0.1rem 1rem;
                }
                .table tbody tr td {
                    padding: 0.1rem 1rem;
                    vertical-align: middle;
                }
                .btn-returned, .btn-borrowing {
                    font-size: 1rem; /* Cỡ chữ */
                    padding: 0.2rem 0.5rem; /* Padding */
                    border-radius: 0.2rem; /* Bo góc */
                }
                .btn-returned {
                    background-color: #6c757d;
                    color: #fff;
                    cursor: not-allowed;
                }
                .btn-borrowing {
                    background-color: #28a745;
                    color: #fff;
                }
                .table th, .table td {
                    text-align: left; /* Căn trái cho các ô */
                }
                .action-buttons a,
                .action-buttons form,
                .action-buttons span {
                    margin-right: 15px; /* Khoảng cách giữa các nút */
                }
            </style>
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
                    @foreach ($borrows as $index => $borrow)
                    <tr>
                        <td>{{ ($borrows->currentPage() - 1) * $borrows->perPage() + $index + 1 }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td class="action-buttons">
                            <!-- Nút chỉnh sửa -->
                            <a href="{{ route('borrow.edit', $borrow->id) }}" class="btn btn-warning text-white" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill"></i></a>

                            <!-- Nút mở modal xóa -->
                            <a href="#deleteBorrowModal{{ $borrow->id }}" class="btn btn-danger text-white" data-bs-toggle="modal" title="Delete"><i class="bi bi-trash"></i></a>

                            <!-- Nút cập nhật trạng thái mượn trả sách -->
                            @if ($borrow->status == 0)
                            <form action="{{ route('borrow.updateStatus', $borrow->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-borrowing text-white" data-toggle="tooltip" title="Update Status">Đang mượn</button>
                            </form>
                            @else
                            <span class="btn btn-returned"><i class="bi bi-check-circle"></i> Đã trả</span>
                            @endif

                            <!-- Nút xem lịch sử mượn trả sách -->
                            <a href="{{ route('borrow.history', $borrow->reader->id) }}" class="btn btn-info text-white" data-toggle="tooltip" title="View History"><i class="bi bi-clock-history"></i></a>

                            <!-- Modal xác nhận xóa -->
                            <div id="deleteBorrowModal{{ $borrow->id }}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('borrow.destroy', $borrow->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xác nhận xóa</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn có chắc chắn muốn xóa bản ghi này?</p>
                                                <p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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