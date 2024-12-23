@extends('layouts.app')

@section('title', 'QUẢN LÝ ĐỘC GIẢ (READER)')

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
                        <a href="{{ route('reader.create') }}" class="btn btn-success"><i class="bi bi-person-plus"></i> <span>Thêm độc giả</span></a>

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>BIRTHDAY</th>
                        <th>ADDRESS</th>
                        <th>PHONE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($readers as $index => $reader)
                    <tr>
                        <!-- Tính thứ tự: (Trang hiện tại - 1) * Số bản ghi mỗi trang + chỉ số trong trang + 1 -->
                        <td>{{ ($readers->currentPage() - 1) * $readers->perPage() + $index + 1 }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <!-- Nút chỉnh sửa -->
                            <a href="{{ route('reader.edit', $reader->id) }}" class="edit" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill text-warning ms-2"></i></a>

                            <!-- Nút mở modal xóa -->
                            <a href="#deleteReaderModal{{ $reader->id }}" class="delete" data-bs-toggle="modal" title="Delete"><i class="bi bi-trash text-danger ms-4"></i></a>
                            <!-- Modal xác nhận xóa -->
                            <div id="deleteReaderModal{{ $reader->id }}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('reader.destroy', $reader->id) }}" method="POST">
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

                            @endforeach
                </tbody>

            </table>
            <div class="clearfix">
                <div class="pagination-wrapper" style="float: right;">
                    @if ($readers->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($readers->onFirstPage())
                        <li class="disabled"><span>&laquo;</span></li>
                        @else
                        <li><a href="{{ $readers->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($readers->links()->elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                        @foreach ($element as $page => $url)
                        @if ($page == $readers->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                        @elseif ($page == 1 || $page == 2 || $page == 3 || $page == $readers->lastPage() || $page == $readers->lastPage() - 1 || $page == $readers->lastPage() - 2)
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == 4)
                        <li class="disabled"><span>...</span></li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($readers->hasMorePages())
                        <li><a href="{{ $readers->nextPageUrl() }}" rel="next">&raquo;</a></li>
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