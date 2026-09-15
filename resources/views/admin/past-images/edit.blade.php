@extends('admin.master')
@section('title','Edit Past Trip Image')
@section('breadcrumb')
    <a href="{{ route('pasttrip.image.create',$pastTrip->id) }}" class="btn btn-primary btn-sm">Back</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Image of <em>{{ ucfirst($pastTrip->title) }}</em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="{{ route('pasttrip.image.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <input type="hidden" name="past_trip_id" value="{{ $pastTrip->id }}">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name',$data->name) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-8">
                                <select name="category" class="form-control" required>
                                    <option value="team" {{ old('category',$data->category) == 'team' ? 'selected' : '' }}>Team Member</option>
                                    <option value="tripimage" {{ old('category',$data->category) == 'tripimage' ? 'selected' : '' }}>Trip Image</option>
                                    <option value="document" {{ old('category',$data->category) == 'document' ? 'selected' : '' }}>Document</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Position</label>
                            <div class="col-lg-8">
                                <input type="text" name="position" class="form-control" placeholder="Position" value="{{ old('position',$data->position) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Country</label>
                            <div class="col-lg-8">
                                <input type="text" name="country" class="form-control" placeholder="Country" value="{{ old('country',$data->country) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Current Image</label>
                            <div class="col-lg-8">
                                <img src="{{ asset('uploads/pastimages/'.$data->image) }}" alt="{{ $data->name }}" style="max-width:250px;height:180px;object-fit:cover;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">New Image</label>
                            <div class="col-lg-8">
                                <input type="file" name="image" class="form-control">
                                <small class="text-muted">Leave empty to keep the current image.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('pasttrip.image.create',$pastTrip->id) }}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
