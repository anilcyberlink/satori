@extends('admin.master')
@section('title', 'Past Trip Images')
@section('breadcrumb')
    <a href="{{ route('pasttrip.index', $pastTrip->trip_id) }}" class="btn btn-primary btn-sm">Past Trips</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Add Images of <em>{{ ucfirst($pastTrip->title) }}</em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="{{ route('pasttrip.image.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="past_trip_id" value="{{ $pastTrip->id }}">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-8">
                                <select name="category" class="form-control" required>
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="team">Team Member</option>
                                    <option value="tripimage">Trip Image</option>
                                    <option value="document">Document</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Position</label>
                            <div class="col-lg-8">
                                <input type="text" name="position" class="form-control" placeholder="Position">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Country</label>
                            <div class="col-lg-8">
                                <input type="text" name="country" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Image</label>
                            <div class="col-lg-8">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Team Members</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @forelse($data->where('category','team') as $image)
                            <div class="col-md-3 col-sm-4 col-xs-6 mb20">
                                <div class="thumbnail">
                                    <div style="position:relative;">
                                        <img src="{{ asset('uploads/pastimages/' . $image->image) }}"
                                            alt="{{ $image->name }}" style="width:100%;height:180px;object-fit:cover;">
                                        <form action="{{ route('pasttrip.image.destroy', $image->id) }}" method="POST"
                                            style="position:absolute;top:5px;right:5px;">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this data?');"
                                                style="border:0;background:#fc0901;color:#fff;width:28px;height:28px;border-radius:50%;font-size:18px;line-height:28px;padding:0;">
                                                ×
                                            </button>
                                        </form>
                                    </div>
                                    <a href="{{ route('pasttrip.image.edit',$image->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                    <div class="caption">
                                        <h4>{{ $image->name }}</h4>
                                        @if ($image->position)
                                            <p>{{ $image->position }}</p>
                                        @endif
                                        @if ($image->country)
                                            <p>{{ $image->country }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-muted">No team member images available.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Trip Photos</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @forelse($data->where('category','tripimage') as $image)
                            <div class="col-md-3 col-sm-4 col-xs-6 mb20">
                                <div class="thumbnail">
                                    <div style="position:relative;">
                                        <img src="{{ asset('uploads/pastimages/' . $image->image) }}"
                                            alt="{{ $image->name }}" style="width:100%;height:180px;object-fit:cover;">
                                        <form action="{{ route('pasttrip.image.destroy', $image->id) }}" method="POST"
                                            style="position:absolute;top:5px;right:5px;">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this data?');"
                                                style="border:0;background:#fc0901;color:#fff;width:28px;height:28px;border-radius:50%;font-size:18px;line-height:28px;padding:0;">
                                                ×
                                            </button>
                                        </form>
                                    </div>
                                    <a href="{{ route('pasttrip.image.edit',$image->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                    @if ($image->name)
                                        <div class="caption">
                                            <h4>{{ $image->name }}</h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-muted">No trip photos available.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Documents</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @forelse($data->where('category','document') as $image)
                            <div class="col-md-3 col-sm-4 col-xs-6 mb20">
                                <div class="thumbnail">
                                    <div style="position:relative;">
                                        <img src="{{ asset('uploads/pastimages/' . $image->image) }}"
                                            alt="{{ $image->name }}" style="width:100%;height:180px;object-fit:cover;">
                                        <form action="{{ route('pasttrip.image.destroy', $image->id) }}" method="POST"
                                            style="position:absolute;top:5px;right:5px;">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this data?');"
                                                style="border:0;background:#fc0901;color:#fff;width:28px;height:28px;border-radius:50%;font-size:18px;line-height:28px;padding:0;">
                                                ×
                                            </button>
                                        </form>
                                    </div>
                                    <a href="{{ route('pasttrip.image.edit',$image->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                    <div class="caption">
                                        <h4>{{ $image->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-muted">No documents available.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
