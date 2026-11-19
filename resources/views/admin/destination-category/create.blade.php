
@extends('admin.master')

@section('title', 'Destination Category')

@section('breadcrumb')
    <a href="{{ route('destination-category.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection

@section('content')
    <form class="form-horizontal" role="form" action="{{ route('destination-category.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="col-md-9">
            {{-- Input Fields --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Add Destination Category</span>
                </div>

                <div class="panel-body">

                    {{-- Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="text" id="title" name="title" class="form-control" required />
                            <input type="hidden" id="uri" name="uri" value="" />
                        </div>
                    </div>

                    {{-- Sub Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Sub Title</label>
                        <div class="col-lg-9">
                            <input type="text" name="sub_title" class="form-control" />
                        </div>
                    </div>

                    {{-- Brief --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Brief</label>
                        <div class="col-lg-9">
                            <textarea name="brief" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-9">
                            <textarea id="description" name="description" class="my-editor form-control"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SEO --}}
            <div class="panel">
                @include('admin.seo.seo-form', [
                    'seo' => $data->seo ?? null
                ])
            </div>
        </div>

        <div class="col-md-3">
            <div class="admin-form">

                {{-- Publishing --}}
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status:
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#publish_1">
                                Active
                            </a>
                        </div>
                    </div>

                    <input type="hidden" name="status" value="1">

                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4>Destination</h4>
                    <label class="field">
                        <select name="destination_id" class="form-control" required>
                            <option disabled hidden selected>Select Destination</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}">
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
                        <input type="number" min="1" id="ordering" name="ordering" class="form-control" value="{{ $ordering }}" />
                    </label>
                </div>

                {{-- Thumbnail --}}
                <div class="sid_bvijay mb10">
                    <h4>Thumbnail</h4>
                    <div class="hd_show_con">
                        <input type="file" name="thumbnail" accept="image/*" />
                    </div>
                </div>

                {{-- Banner --}}
                <div class="sid_bvijay mb10">
                    <h4>Banner</h4>
                    <div class="hd_show_con">
                        <input type="file" name="banner" accept="image/*" />
                    </div>
                </div>

                {{-- Multiple Banners --}}
                <div class="sid_bvijay mb10">
                    <h4>Multiple Banners</h4>
                    <div class="hd_show_con">
                        <input type="file" name="multi_banners[]" multiple accept="image/*">
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
@endsection
