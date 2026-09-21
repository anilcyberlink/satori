@extends('admin.master')
@section('title', 'Edit Newsletter')
@section('breadcrumb')
    <a href="{{ route('newsletter.index') }}" class="btn btn-primary btn-sm">
        List
    </a>
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Edit Newsletter</span>
        </div>
        <div class="panel-body ph20">
            <form action="{{ route('newsletter.update', $data->id) }}" method="POST" id="newsletterForm">
                @csrf
                {{-- Title --}}
                <div class="form-group">
                    <label for="title">
                        Title <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $data->title) }}"
                        placeholder="Enter newsletter title" required>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Content --}}
                <div class="form-group">
                    <label for="edt">
                        Content <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control my-editor" id="edt" name="content"
                        rows="8">{{ old('content', $data->content) }}</textarea>
                    <span id="content-error" class="text-danger" style="display:none;">
                        Please enter newsletter content.
                    </span>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Publish Date --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publish_date">
                                Publish Date <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="publish_date" id="publish_date" class="form-control"
                                value="{{ old('publish_date', $data->publish_date) }}" required>
                            @error('publish_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <br>
                </div>
                <hr>
                {{-- Actions --}}
                <div class="text-left">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-paper-plane"></i>
                        Update Newsletter
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#newsletterForm').on('submit', function (e) {
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }
                var content = $('#edt').val();
                if (!content || content.trim() === '' || content === '<p>&nbsp;</p>') {
                    e.preventDefault();
                    $('#content-error').show();
                    return false;
                }
                $('#content-error').hide();
            });
        });
    </script>
@endsection
