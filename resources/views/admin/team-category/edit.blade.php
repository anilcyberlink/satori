@extends('admin.master')
@section('title', 'Team Category')
@section('breadcrumb')
    <a href="{{ url('admin/teamcategory') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

    <form class="form-horizontal" role="form" action="{{ url('admin/teamcategory', $data->id) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Team Category</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label">Category Name</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="category" name="category" class="form-control" placeholder=""
                                    value="{{ $data->category }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="cat_uri" name="uri" class="form-control"
                                    value="{{ $data->uri }}" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label">Thumbnail</label>
                        <div class="col-lg-8">
                            <div id="xedit-demo">
                                <div class="bs-component">
                                    <input type="file" name="picture" />
                                    @if ($data->picture)
                                        <div class="id{{ $data->id }}"
                                            style="position:relative; display:block; margin-top:10px; width:120px;">
                                            <a href="#{{ $data->id }}" class="imagedelete"
                                                style="position:absolute; top:-8px; right:-8px; z-index:2; width:22px; height:22px; line-height:20px; text-align:center; background:#fff; border:1px solid #ddd; border-radius:50%; color:#d9534f; text-decoration:none; font-size:13px;">X</a>
                                            <div
                                                style="width:120px; height:120px; border:1px solid #ddd; background:#f8f8f8; display:flex; align-items:center; justify-content:center; padding:10px;">
                                                <img src="{{ asset(env('PUBLIC_PATH') . '/uploads/team/' . $data->picture) }}"
                                                    style="max-width:100%; max-height:100%; width:auto; height:auto; object-fit:contain;" />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-form">
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status:
                            <a>
                                {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                            </a>
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Ordering </h4>
                    <label class="field text">
                        <input type="number" id="inputStandard" name="ordering" class="form-control"
                            value="{{ $data->ordering }}" placeholder="Order" />
                    </label>
                </div>

            </div>

        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        // Delete Thumb
        $(document).ready(function() {
            $('.imagedelete').on('click', function(e) {
                e.preventDefault();
                if (!confirm('Are you sure to delete?')) return false;
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('href').slice(1);
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('delete_teamcategory_thumb') }}/" + id,
                    data: {
                        _token: csrf
                    },
                    success: function(data) {
                        $('.id' + id).remove();
                    },
                    error: function(xhr) {
                        alert('Error deleting thumbnail.');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#category').on('keyup', function() {
                var category;
                category = $('#category').val();
                category = category.replace(/[^a-zA-Z0-9 ]+/g, "");
                category = category.replace(/\s+/g, "-");
                $('#cat_uri').val(category);
            });
        });
    </script>
@endsection
