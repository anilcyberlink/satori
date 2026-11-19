@extends('admin.master')

@section('title', 'Edit Destination Category')

@section('breadcrumb')
    <a href="{{ route('destination-category.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection

@section('content')
    <form class="form-horizontal" role="form" action="{{ route('destination-category.update', $data->id) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="col-md-9">
            {{-- Input Fields --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Destination Category</span>
                </div>

                <div class="panel-body">

                    {{-- Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ old('title', $data->title) }}" required />
                            <input type="hidden" id="uri" name="uri" value="{{ old('uri', $data->uri) }}" />
                        </div>
                    </div>

                    {{-- Sub Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Sub Title</label>
                        <div class="col-lg-9">
                            <input type="text" name="sub_title" class="form-control"
                                value="{{ old('sub_title', $data->sub_title) }}" />
                        </div>
                    </div>

                    {{-- Brief --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Brief</label>
                        <div class="col-lg-9">
                            <textarea name="brief" class="form-control" rows="3">{{ old('brief', $data->brief) }}</textarea>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-9">
                            <textarea id="description" name="description" class="my-editor form-control">{{ old('description', $data->description) }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel">
                @include('admin.seo.seo-form', [
                    'seo' => $data->seo ?? null,
                ])
            </div>
        </div>

        <div class="col-md-3">
            <div class="admin-form">

                {{-- Publishing --}}
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="">
                            <label>Status:
                                <input type="checkbox" name="status" value="1"
                                    {{ old('status', $data->status) == 1 ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>

                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Update" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>

                {{-- Destination --}}
                <div class="sid_bvijay mb10">
                    <h4>Destination</h4>
                    <label class="field">
                        <select name="destination_id" class="form-control " required>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id', $data->destination_id) == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->title }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>

                {{-- Ordering --}}
                <div class="sid_bvijay mb10">
                    <h4>Ordering</h4>
                    <label class="field">
                        <input type="number" min="1" id="ordering" name="ordering" class="form-control"
                            value="{{ old('ordering', $data->ordering) }}" />
                    </label>
                </div>

                <div class="sid_bvijay mb10">
                    <h4>Thumbnail</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <input type="file" name="thumbnail" />
                        </div>

                        @if ($data->thumbnail)
                            <span class="thumbnailid{{ $data->id }}">
                                <a href="#{{ $data->id }}" class="delete_thumbnail">X</a>
                                <br>
                                <img src="{{ asset('uploads/thumbnails/' . $data->thumbnail) }}" width="100%" />
                            </span>
                        @endif
                    </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4>Banner</h4>
                    <div class="hd_show_con">
                        <div class="bs-component">
                            <input type="file" name="banner" />
                        </div>

                        @if ($data->banner)
                            <span class="bannerid{{ $data->id }}">
                                <a href="#{{ $data->id }}" class="delete_banner">X</a>
                                <br>
                                <img src="{{ asset('uploads/original/' . $data->banner) }}" width="100%" />
                            </span>
                        @endif
                    </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4>Multiple Banners</h4>
                    <div class="hd_show_con">
                        <div class="bs-component">
                            <input type="file" name="multi_banners[]" multiple accept="image/*">
                        </div>
                        @foreach ($data->multiBanners as $multiBanner)
                            <span class="multi-banner-id{{ $multiBanner->id }}"
                                style="display:inline-block; margin:10px 5px;">
                                <a href="javascript:void(0);" data-id="{{ $multiBanner->id }}"
                                    class="delete_multi_banner">X</a>
                                <br>
                                <img src="{{ asset('uploads/original/' . $multiBanner->image) }}" width="100%">
                                <small>{{ $multiBanner->title }}</small>
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@section('additional-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title = $(this).val();
                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");
                title = title.trim().replace(/\s+/g, "-").toLowerCase();
                $('#uri').val(title);
            });

            $('.related-destination').select2({
                placeholder: 'Select Destination',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
    <script>
        $('.delete_thumbnail').on('click', function(e) {
            e.preventDefault();

            if (!confirm('Are you sure you want to delete this thumbnail?')) return false;

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href').slice(1);

            var url = "{{ route('delete.destcategory.thumb', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('span.thumbnailid' + id).remove();
                },
                error: function(data) {
                    alert('Error deleting thumbnail!');
                }
            });
        });

        $('.delete_banner').on('click', function(e) {
            e.preventDefault();

            if (!confirm('Are you sure you want to delete this banner?')) return false;

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href').slice(1);

            var url = "{{ route('delete.destcategory.banner', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('span.bannerid' + id).remove();
                },
                error: function(data) {
                    alert('Error deleting banner!');
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete_multi_banner', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete this banner?')) return;
            var id = $(this).data('id');
            var url = "{{ route('multi-banner.destroy', ':id') }}".replace(':id', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    $('.multi-banner-id' + id).remove();
                },
                error: function() {
                    alert('Error deleting banner!');
                }
            });
        });
    </script>
@endsection
