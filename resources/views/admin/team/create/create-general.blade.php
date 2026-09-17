<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">New Member</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                                value="{{ old('name') }}" required />
                            <input type="hidden" id="uri" name="uri" value="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Position</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="position" class="form-control" placeholder="Position"
                                value="{{ old('position') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Category</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <select name="category" class="form-control team-select" required>
                                <option value="" disabled hidden selected> Select Category </option>
                                @if ($category)
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}"> {{ $row->category }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Phone</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="phone" class="form-control" placeholder="Phone"
                                value="{{ old('phone') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Email Address" value="{{ old('email') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Twitter Link</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" name="twitter_url" class="form-control"
                                placeholder="" value="{{ old('twitter_url') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Instagram Link</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text"  name="instagram_url" class="form-control"
                                placeholder="" value="{{ old('instagram_url') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-9">
                        <div class="bs-component">
                            <textarea class="form-control my-editor" name="content" rows="12">{{ old('content') }}</textarea>
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
                                Active
                            </a>
                        </div>
                    </div>
                    <div class="sid_bvijay mb10"
                        style="background:#fff; border:1px solid #e5e5e5; border-radius:4px; padding:12px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                        <label class="field text" style="margin:0;">
                            <strong>Ordering:</strong>
                            <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                                min="1" value="{{ $ordering }}" style="margin-top:8px;" />
                        </label>
                    </div>
                    <div class="sid_bvijay mb10"
                        style="background:#fff; border:1px solid #e5e5e5; border-radius:4px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                        <div class="hd_show_con" style="padding:14px 12px;">
                            <strong>Show in Home</strong>
                            <input type="checkbox" name="show_in_home" value="0" style="margin-left:5px;" />
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
