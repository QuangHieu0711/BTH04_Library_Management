@extends('layouts.app')

@section('title', 'QUẢN LÝ ĐỘC GIẢ (READER)')

@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title mt-4">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="" class="btn btn-success"><i class="bi bi-person-plus"></i> <span>Thêm độc giả</span></a>

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
                    @foreach ($readers as $reader)
                    <tr>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <a href="{{ route('reader.edit', $reader->id) }}" class="edit" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill text-warning ms-2"></i></a>
                            <a href="#deleteReaderModal{{ $reader->id }}" class="delete" data-toggle="modal" title="Delete"><i class="bi bi-trash text-danger ms-4"></i></a>
                        </td>
                    </tr>
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