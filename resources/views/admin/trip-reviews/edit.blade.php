@extends('admin.master')
@section('title', 'Edit Trip Review')
@section('breadcrumb')
    <a href="{{ route('trip-review') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    {{-- Change this route to your update route --}}
    <form class="form-horizontal" role="form" action="{{ route('edit-trip-review', $data->id) }}" method="post"
        enctype="multipart/form-data" id="review_form">
        {{ csrf_field() }}
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Trip Review</span>
                </div>
                <div class="panel-body">
                    {{-- Trip --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Select Trip</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="trip_id" required>
                                <option value="" disabled hidden>Please Select Trip</option>
                                @foreach ($trip as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('trip_id', $data->trip_id) == $value->id ? 'selected' : '' }}>
                                        {{ $value->trip_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Full Name --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                                value="{{ old('full_name', $data->full_name) }}" required>
                        </div>
                    </div>
                    {{-- Country --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-8">
                            <input type="text" name="country" class="form-control" placeholder="Country"
                                value="{{ old('country', $data->country) }}" required>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ old('email', $data->email) }}">
                        </div>
                    </div>
                    {{-- Contact --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Contact</label>
                        <div class="col-lg-8">
                            <input type="text" name="contact" class="form-control" placeholder="Contact"
                                value="{{ old('contact', $data->contact) }}">
                        </div>
                    </div>
                    {{-- Review Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Review Title</label>
                        <div class="col-lg-8">
                            <input type="text" name="title" class="form-control" placeholder="Review Title"
                                value="{{ old('title', $data->title) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Helpful Votes</label>
                        <div class="col-lg-8">
                            <input type="number" name="usefulness" min="1" class="form-control" placeholder="" value="{{ old('usefulness', $data->usefulness) }}" required>
                        </div>
                    </div>
                    {{-- Rating --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Rating</label>
                        <div class="col-lg-8">
                            <select name="rating" class="form-control" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}"
                                        {{ old('rating', $data->rating) == $i ? 'selected' : '' }}>
                                        {{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    {{-- Message --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="message" rows="9" autocomplete="off" required>{{ old('message', $data->message) }}</textarea>
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
                            Status:
                            @if ($data->status == 1)
                                <a>Active</a>
                            @else
                                <a style="color:#dc3545;">Inactive</a>
                            @endif
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Update">
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>
                {{-- Profile Image --}}
                <div class="sid_bvijay mb10">
                    <h4>Profile Image</h4>
                    <div class="hd_show_con">
                        @if ($data->image)
                            <div style="margin-bottom:10px;">
                                <img src="{{ asset('uploads/reviews/' . $data->image) }}" alt="Profile"
                                    style="width:90px; height:90px; object-fit:cover; border-radius:6px;">
                            </div>
                        @endif
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
                        {{-- Existing photos --}}
                        <ul id="existing_photos" style="list-style:none; padding:0; margin:0 0 10px;">
                            @foreach ($data->images as $img)
                                <li data-id="{{ $img->id }}"
                                    style="display:flex; justify-content:space-between; align-items:center; padding:6px 10px; margin-bottom:5px; border:1px solid #ddd; border-radius:4px;">
                                    <span style="display:flex; align-items:center; overflow:hidden; margin-right:10px;">
                                        <img src="{{ asset('uploads/reviews/' . $img->image) }}" alt=""
                                            style="width:36px; height:36px; object-fit:cover; border-radius:4px; margin-right:8px;">
                                        <span style="overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                            {{ $img->image }}
                                        </span>
                                    </span>
                                    <button type="button" class="remove-existing" title="Remove"
                                        style="border:0; background:none; color:#dc3545; font-size:20px; line-height:1; cursor:pointer;">&times;</button>
                                </li>
                            @endforeach
                        </ul>

                        <input type="file" id="trip_photos" name="trip_photos[]" accept="image/*" multiple>
                        <small>Maximum 5 images (including existing)</small>
                        <small id="trip_photos_error" class="text-danger" style="display:none;"></small>

                        {{-- Newly selected photos --}}
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
            const existing = document.getElementById('existing_photos');
            const dt = new DataTransfer(); // holds the newly selected files

            const csrf = '{{ csrf_token() }}';
            const deleteUrl = "{{ route('delete-trip-review-image', ':id') }}";

            function existingCount() {
                return existing.querySelectorAll('li').length;
            }

            // Delete an existing photo (asks first, then deletes from DB + disk)
            existing.addEventListener('click', function(e) {
                const btn = e.target.closest('.remove-existing');
                if (!btn) return;

                if (!confirm('Are you sure you want to delete this image?')) return;

                const li = btn.closest('li');
                btn.disabled = true;

                fetch(deleteUrl.replace(':id', li.dataset.id), {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('Delete failed');
                        return res.json();
                    })
                    .then(() => {
                        li.remove();
                        error.style.display = 'none';
                    })
                    .catch(() => {
                        btn.disabled = false;
                        error.textContent = 'Could not delete the image. Please try again.';
                        error.style.display = 'block';
                    });
            });

            input.addEventListener('change', function() {
                error.style.display = 'none';

                Array.from(this.files).forEach(file => {
                    const duplicate = Array.from(dt.files).some(
                        f => f.name === file.name && f.size === file.size && f.lastModified === file.lastModified
                    );
                    if (duplicate) return;

                    if (existingCount() + dt.items.length >= MAX_FILES) {
                        error.textContent = `You can have a maximum of ${MAX_FILES} images in total.`;
                        error.style.display = 'block';
                        return;
                    }
                    dt.items.add(file);
                });

                input.files = dt.files;
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
