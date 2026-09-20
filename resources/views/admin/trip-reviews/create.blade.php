@extends('admin.master')
@section('title', 'Trip Review')
@section('breadcrumb')
    <a href="{{ route('trip-review') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ route('post-trip-review') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Create Trip Review</span>
                </div>
                <div class="panel-body">
                    {{-- Trip --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Select Trip</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="trip_id" required>
                                <option value="" selected disabled hidden>Please Select Trip</option>
                                @foreach ($trip as $value)
                                    <option value="{{ $value->id }}">{{ $value->trip_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Full Name --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                        </div>
                    </div>
                    {{-- Country --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-8">
                            <input type="text" name="country" class="form-control" placeholder="Country" required>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    {{-- Contact --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Contact</label>
                        <div class="col-lg-8">
                            <input type="text" name="contact" class="form-control" placeholder="Contact">
                        </div>
                    </div>
                    {{-- Review Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Review Title</label>
                        <div class="col-lg-8">
                            <input type="text" name="title" class="form-control" placeholder="Review Title" required>
                        </div>
                    </div>
                    {{-- Rating --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Rating</label>
                        <div class="col-lg-8">
                            <select name="rating" class="form-control" required>
                                <option value="" selected disabled hidden>Select Rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                    </div>
                    {{-- Message --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="message" rows="9" autocomplete="off" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="admin-form">
                {{-- Status --}}
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status: <a>Inactive</a>
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Publish">
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>
                {{-- Review Image --}}
                <div class="sid_bvijay mb10">
                    <h4>Profile Image</h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            <input type="file" name="photo" accept="image/*">
                        </div>
                        <small>(width: 1000px height: 1000px)</small>
                    </div>
                </div>
                {{-- Trip Photos --}}
                <div class="sid_bvijay mb10">
                    <h4>Trip Photos</h4>
                    <div class="hd_show_con">
                        <input type="file" id="trip_photos" name="trip_photos[]" accept="image/*" multiple>
                        <small>Maximum 5 images</small>
                        <small id="trip_photos_error" class="text-danger" style="display:none;"></small>

                        <ul id="trip_photos_list" style="list-style:none; padding:0; margin:10px 0 0;"></ul>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <script>
        (function() {
            const MAX_FILES = 5;
            const input = document.getElementById('trip_photos');
            const error = document.getElementById('trip_photos_error');
            const list = document.getElementById('trip_photos_list');
            const dt = new DataTransfer(); // holds the accumulated files

            input.addEventListener('change', function() {
                error.style.display = 'none';

                Array.from(this.files).forEach(file => {
                    const duplicate = Array.from(dt.files).some(
                        f => f.name === file.name && f.size === file.size && f.lastModified === file
                        .lastModified
                    );
                    if (duplicate) return;

                    if (dt.items.length >= MAX_FILES) {
                        error.textContent = `You can upload a maximum of ${MAX_FILES} images.`;
                        error.style.display = 'block';
                        return;
                    }
                    dt.items.add(file);
                });

                input.files = dt.files; // sync the input with our list
                render();
            });

            function render() {
                list.innerHTML = '';

                Array.from(dt.files).forEach((file, index) => {
                    const li = document.createElement('li');
                    li.style.cssText =
                        'display:flex; justify-content:space-between; align-items:center; padding:6px 10px; margin-bottom:5px; border:1px solid #ddd; border-radius:4px;';

                    const name = document.createElement('span');
                    name.textContent = file.name;
                    name.style.cssText =
                        'overflow:hidden; text-overflow:ellipsis; white-space:nowrap; margin-right:10px;';

                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.innerHTML = '&times;';
                    btn.title = 'Remove';
                    btn.style.cssText =
                        'border:0; background:none; color:#dc3545; font-size:20px; line-height:1; cursor:pointer;';
                    btn.addEventListener('click', () => {
                        dt.items.remove(index);
                        input.files = dt.files;
                        error.style.display = 'none';
                        render();
                    });

                    li.append(name, btn);
                    list.appendChild(li);
                });
            }
        })();
    </script>
@endsection
