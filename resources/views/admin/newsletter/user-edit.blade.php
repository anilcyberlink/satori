@extends('admin.master')
@section('title', 'Update Subscriber')
@section('breadcrumb')
    <a href="{{ route('subscriber.index') }}" class="btn btn-primary btn-sm">
        List
    </a>
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Edit Subscriber</span>
        </div>
        <div class="panel-body ph20">
            <form action="{{ route('subscriber.edit') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="form-group">
                    <label for="email">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $data->email) }}" placeholder="Enter subscriber email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="text-left">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Update Subscriber
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
