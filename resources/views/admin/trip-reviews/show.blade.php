@extends('admin.master')
@section('title', 'View Trip Review')
@section('breadcrumb')
    <a href="{{ route('trip-review') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <style>
        .review-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 12px;
        }

        .review-gallery a {
            position: relative;
            display: block;
            aspect-ratio: 1 / 1;
            border-radius: 8px;
            overflow: hidden;
            background: #f2f2f2;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .15);
        }

        .review-gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s ease;
        }

        .review-gallery a:hover img {
            transform: scale(1.08);
        }

        /* Viewer */
        #gallery_viewer {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: rgba(0, 0, 0, .88);
            align-items: center;
            justify-content: center;
        }

        #gallery_viewer.open {
            display: flex;
        }

        #gallery_viewer img {
            max-width: 90%;
            max-height: 85vh;
            border-radius: 6px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, .6);
        }

        #gallery_viewer button {
            position: absolute;
            border: 0;
            background: rgba(255, 255, 255, .15);
            color: #fff;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            font-size: 26px;
            line-height: 1;
            cursor: pointer;
        }

        #gallery_viewer button:hover {
            background: rgba(255, 255, 255, .3);
        }

        #gallery_viewer .gv-close {
            top: 20px;
            right: 20px;
        }

        #gallery_viewer .gv-prev {
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        #gallery_viewer .gv-next {
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        #gallery_viewer .gv-count {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-size: 14px;
        }
    </style>

    <div class="form-horizontal">
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">View Trip Review</span>
                </div>
                <div class="panel-body">
                    {{-- Trip --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Trip</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{{ $data->trip_title ?: '-' }}</p>
                        </div>
                    </div>
                    {{-- Full Name --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{{ $data->full_name }}</p>
                        </div>
                    </div>
                    {{-- Country --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{{ $data->country ?: '-' }}</p>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">
                                @if ($data->email)
                                    <a>{{ $data->email }}</a>
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                    {{-- Contact --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Contact</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{{ $data->contact ?: '-' }}</p>
                        </div>
                    </div>
                    {{-- Review Title --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Review Title</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{{ $data->title }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Helpful Votes</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{{ $data->usefulness }}</p>
                        </div>
                    </div>
                    {{-- Rating --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Rating</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">
                                <span style="color:#f5a623; font-size:18px; letter-spacing:2px;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        {{ $i <= $data->rating ? '★' : '☆' }}
                                    @endfor
                                </span>
                                <span style="margin-left:6px;">({{ $data->rating }}/5)</span>
                            </p>
                        </div>
                    </div>
                    {{-- Message --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{!! nl2br(e($data->message)) !!}</p>
                        </div>
                    </div>
                    {{-- Trip Photos --}}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">
                            Trip Photos
                            @if ($data->images->count())
                                <br><small class="text-muted">({{ $data->images->count() }})</small>
                            @endif
                        </label>
                        <div class="col-lg-8">
                            @if ($data->images->count())
                                <div class="review-gallery">
                                    @foreach ($data->images as $img)
                                        <a href="{{ asset('uploads/reviews/' . $img->image) }}">
                                            <img src="{{ asset('uploads/reviews/' . $img->image) }}" alt="Trip photo">
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p class="form-control-static">No trip photos</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="admin-form">
                {{-- Status + Edit --}}
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
                            <a href="{{ url('admin-trip-edit-review/' . $data->id . '/edit') }}"
                                class="btn btn-primary btn-lg">Edit</a>
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
                            <a href="{{ asset('uploads/reviews/' . $data->image) }}" target="_blank">
                                <img src="{{ asset('uploads/reviews/' . $data->image) }}" alt="Profile"
                                    style="width:100%; max-width:150px; border-radius:6px;">
                            </a>
                        @else
                            <small>No profile image</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Full-size viewer --}}
    <div id="gallery_viewer">
        <button type="button" class="gv-close" title="Close">&times;</button>
        <button type="button" class="gv-prev" title="Previous">&#8249;</button>
        <img src="" alt="">
        <button type="button" class="gv-next" title="Next">&#8250;</button>
        <span class="gv-count"></span>
    </div>

    <script>
        (function() {
            const links = Array.from(document.querySelectorAll('.review-gallery a'));
            if (!links.length) return;

            const viewer = document.getElementById('gallery_viewer');
            const bigImg = viewer.querySelector('img');
            const count = viewer.querySelector('.gv-count');
            const urls = links.map(a => a.href);
            let current = 0;

            function show(i) {
                current = (i + urls.length) % urls.length;
                bigImg.src = urls[current];
                count.textContent = (current + 1) + ' / ' + urls.length;
            }

            function open(i) {
                show(i);
                viewer.classList.add('open');
            }

            function close() {
                viewer.classList.remove('open');
            }

            links.forEach((a, i) => a.addEventListener('click', e => {
                e.preventDefault();
                open(i);
            }));

            viewer.querySelector('.gv-close').addEventListener('click', close);
            viewer.querySelector('.gv-prev').addEventListener('click', () => show(current - 1));
            viewer.querySelector('.gv-next').addEventListener('click', () => show(current + 1));

            // Click on the dark background closes the viewer
            viewer.addEventListener('click', e => {
                if (e.target === viewer) close();
            });

            document.addEventListener('keydown', e => {
                if (!viewer.classList.contains('open')) return;
                if (e.key === 'Escape') close();
                if (e.key === 'ArrowLeft') show(current - 1);
                if (e.key === 'ArrowRight') show(current + 1);
            });
        })();
    </script>
@endsection
