@extends('layouts.app')

@section('title', 'SỬA TÊN ĐỘC GIẢ')

@section('content')
    <div class="container">
        <h1></h1>
        <form action="{{ route('reader.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"><b>NAME:</b></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="birthday"><b>BIRTHDAY:</b></label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $reader->birthday }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="address"><b>ADDRESS:</b></label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $reader->address }}" required>
            </div>
            <br>
            <div class="form-group">
            <label for="phone"><b>PHONE:</b></label>
                <input type="text" class="form-control" id="phone" name="phone" value = "{{ $reader->phone }}" required>
            </div>
            <br>

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
