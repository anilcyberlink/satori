@extends('admin.master')
@section('title', 'Create Subscriber')
@section('breadcrumb')
    <a href="{{ route('subscriber.index') }}" class="btn btn-primary btn-sm">
        List
    </a>
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Add Subscriber</span>
        </div>
        <div class="panel-body ph20">
            <form action="{{ route('subscriber.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        placeholder="Enter subscriber email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="text-left">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Add Subscriber
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
