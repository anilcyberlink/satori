@extends('admin.master')
@section('title', 'Past Trips')
@section('breadcrumb')
    <a href="{{ route('pasttrip.index',$trip->id) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ route('pasttrip.store') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">New Past Trip of <em>{{ ucfirst($trip->trip_title) }}</em></span>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="title" name="title" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="uri" name="uri" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Sub Title</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="sub_title" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel">
                @include('admin.seo.seo-form', [
                    'seo' => $data->seo ?? null
                ])
            </div>
        </div>

        <div class="col-md-3">
            <div class="admin-form">

                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status:
                            <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
                                Active
                            </a>
                        </div>
                    </div>

                    <div>
                        <h4> Order </h4>
                        <input type="number" name="ordering" class="form-control" min="1" placeholder="Order" value="{{ $past_order }}" />
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
                    <h4> Banner </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            <input type="file" name="banner" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var past_trip;
            $('#title').on('keyup', function () {
                past_trip = $('#title').val();
                past_trip = past_trip.replace(/[^a-zA-Z0-9 ]+/g, "");
                past_trip = past_trip.replace(/\s+/g, "-");
                $('#uri').val(past_trip);
            });
        });
    </script>
@endsection
