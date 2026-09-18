<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Edit Member</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                                value="{{ old('name', $data->name) }}" required />
                            <input type="hidden" id="uri" name="uri" value="{{ $data->uri }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Position</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="position" class="form-control" placeholder="Position"
                                value="{{ old('position', $data->position) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Category</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <select name="category" class="form-control team-select" required>
                                <option value="" disabled hidden>Select Category</option>
                                @if ($category)
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $data->team_category == $row->id ? 'selected' : '' }}>
                                            {{ $row->category }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Phone</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="phone" class="form-control" placeholder="Phone"
                                value="{{ old('phone', $data->phone) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Email Address" value="{{ old('email', $data->email) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Twitter Link</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="twitter_url" class="form-control"
                                placeholder="" value="{{ old('twitter_url', $data->twitter_url) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Instagram Link</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="instagram_url" class="form-control"
                                placeholder="" value="{{ old('instagram_url', $data->instagram_url) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-9">
                        <div class="bs-component">
                            <textarea class="form-control my-editor" name="content" rows="12">{{ old('content', $data->content) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin-form">
                    <div class="sid_bvijay mb10"
                        style="background:#fff; border:1px solid #e5e5e5; border-radius:4px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                        <div class="hd_show_con" style="padding:14px 12px;">
                            <strong>Status:</strong>
                            <a>
                                {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                            </a>
                        </div>
                    </div>
                    <div class="sid_bvijay mb10"
                        style="background:#fff; border:1px solid #e5e5e5; border-radius:4px; padding:12px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                        <label class="field text" style="margin:0;">
                            <strong>Ordering:</strong>
                            <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                                min="1" value="{{ old('ordering', $data->ordering) }}" style="margin-top:8px;" />
                        </label>
                    </div>
                    <div class="sid_bvijay mb10"
                        style="background:#fff; border:1px solid #e5e5e5; border-radius:4px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                        <div class="hd_show_con" style="padding:14px 12px;">
                            <strong>Show in Home</strong>
                            <input type="checkbox" name="show_in_home" value="1"
                                style="margin-left:5px;"
                                {{ $data->show_in_home == 1 ? 'checked' : '' }} />
                        </div>
                    </div>
                    <div class="sid_bvijay mb10"
                        style="background:#fff; border:1px solid #e5e5e5; border-radius:4px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                        <h4 style="margin:0; padding:13px 12px; border-bottom:1px solid #e5e5e5; font-size:15px;">
                            Profile Picture
                        </h4>
                        <div class="hd_show_con" style="padding:14px 12px;">
                            <div id="xedit-demo">
                                <input type="file" name="thumbnail" />
                                @if($data->thumbnail)
                                    <span class="thumb_id{{ $data->id }}" style="position:relative; display:inline-block; margin-bottom:10px;">
                                        <img src="{{ asset('uploads/team/' . $data->thumbnail) }}"
                                            alt="{{ $data->name }}"
                                            style="max-width:150px; max-height:150px; display:block;">
                                        <a href="#{{ $data->id }}"
                                            class="thumbdelete"
                                            style="position:absolute; top:5px; right:5px; width:22px; height:22px; line-height:20px; text-align:center; background:#d9534f; color:#fff; border-radius:50%; text-decoration:none; font-size:14px; font-weight:bold; z-index:10;">
                                            ×
                                        </a>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
