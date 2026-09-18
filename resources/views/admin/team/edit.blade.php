@extends('admin.master')
@section('title', Request::segment(2))
@section('breadcrumb')
    <a href="{{ url('admin/teams') }}" class="btn btn-default btn-sm backlink">
        <i class="fa fa-list" aria-hidden="true"></i> Show List
    </a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" id="teamData" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <section class="content">
            <div class="container-fluid">
                <footer>
                    <div id="publishing-action">
                        <button type="submit" name="submit" class="btn btn-success" value="publish">
                            <i class="fa fa-check"></i> Update
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="box-shadow:0 2px 8px rgba(0,0,0,0.08); border:1px solid #e5e5e5;">
                            <div class="card-header d-flex p-0" style="background:#fff; border-bottom:1px solid #e5e5e5;">
                                <ul class="nav nav-pills ml-auto p-2" style="margin-bottom:0;">
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                            <i class="fa fa-user"></i> GENERAL
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab_4" data-toggle="tab">
                                            <i class="fa fa-certificate"></i> CERTIFICATES
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab_2" data-toggle="tab">
                                            <i class="fa fa-globe"></i> SEO
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body" style="padding:25px 20px;">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        @include('admin.team.edit.edit-general')
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        @include('admin.seo.seo-form', [
                                            'seo' => $data->seo ?? null,
                                        ])
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        @include('admin.team.edit.edit-certificates')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        jQuery(document).delegate('a.add-certificates', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_certificates_additional .certificate-item').first().clone();
            var size = jQuery('#certificates-container .certificate-item').length + 1;
            content.attr('id', 'certificates-rec-' + size);
            content.find('input, select').prop('disabled', false);
            content.find('input[name="certificates_id[]"]').val('');
            content.find('input[name="certificates_ordering[]"]').val(size);
            content.find('input[name="certificates_title[]"]').val('');
            content.find('input[name="image[]"]').val('');
            content.find('select[name="type[]"]').val('certificate');
            content.find('.delete-certificates')
                .attr('certificates-data-id', size)
                .removeAttr('certificates-rowid');
            content.appendTo('#certificates-container');
        });
        jQuery(document).delegate('button.delete-certificates', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure you want to delete?");
            if (makeConfirm) {
                var id = jQuery(this).attr('certificates-data-id');
                var certificates_rowid = jQuery(this).attr('certificates-rowid');
                if (certificates_rowid) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var team_id = '{{ $data->id }}';
                    var url = '{{ route('certificates.destroy', ['id' => ':id', 'info_id' => ':info_id']) }}';
                    url = url.replace(':id', team_id);
                    url = url.replace(':info_id', certificates_rowid);
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#certificates-rec-' + certificates_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                } else {
                    $('#certificates-rec-' + id).remove();
                }
                return true;
            }
            return false;
        });

        // Submit Team data
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#teamData").on('submit', function(e) {
                e.preventDefault();
                let team = '{{ $data->id }}';
                let url = '{{ route('teams.update', ['team' => ':team']) }}';
                url = url.replace(':team', team);
                let teamData = document.getElementById('teamData');
                let data = new FormData(teamData);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        console.log('success');
                        console.log(data);
                        location.reload();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error');
                        console.log(textStatus);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                        Toast.fire({
                            icon: 'warning',
                            title: textStatus
                        });
                    }
                });
            });
        });

        $('.thumbdelete').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href').slice(1);
            $.ajax({
                type: 'DELETE',
                url: "{{ url('thumbdelete') }}/" + id,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('.thumb_id' + id).remove();
                },
                error: function(xhr) {
                    alert('Error occurred while deleting image.');
                }
            });
        });

        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var team_name = $('#name').val();
                team_name = team_name.replace(/[^a-zA-Z0-9 ]+/g, "");
                team_name = team_name.replace(/\s+/g, "-");
                $('#uri').val(team_name);
            });
        });
    </script>
@endsection
