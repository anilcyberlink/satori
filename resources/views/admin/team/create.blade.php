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
        <section class="content">
            <div class="container-fluid">
                <footer>
                    <div id="publishing-action">
                        <button type="submit" name="submit" class="btn btn-success" value="publish">
                            <i class="fa fa-check"></i> Publish
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
                                        @include('admin.team.create.create-general')
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        @include('admin.seo.seo-form', [
                                            'seo' => $data->seo ?? null,
                                        ])
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        @include('admin.team.create.create-certificates')
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
        /******** For certificates ********/
        jQuery(document).delegate('a.add-certificates', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_certificates_additional .certificate-item').first().clone();
            var size = jQuery('#certificates-container .certificate-item').length + 1;
            content.attr('id', 'certificates-rec-' + size);
            content.find('.delete-certificates')
                .attr('certificates-data-id', size);
            // Automatically set ordering
            content.find('input[name="certificates_ordering[]"]').val(size);
            // Clear other fields
            content.find('input[name="certificates_title[]"]').val('');
            content.find('input[name="type[]"]').val('');
            content.find('input[type="file"]').val('');
            content.appendTo('#certificates-container');
        });

        jQuery(document).delegate('button.delete-certificates', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure you want to delete?");
            if (makeConfirm) {
                var id = jQuery(this).attr('certificates-data-id');
                jQuery('#certificates-rec-' + id).remove();
                return true;
            }
            return false;
        });
        /******** End For certificates ********/
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#teamData").on('submit', function(e) {
                // tinymce.triggerSave();
                e.preventDefault();
                let url = "{{ route('teams.store') }}";
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
                        // location.reload();
                        document.getElementById("teamData").reset();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // console.log(jqXHR, textStatus, errorThrown);
                        console.log('Error');
                        console.log(textStatus);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: textStatus
                        })
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var team_name;
                team_name = $('#name').val();
                team_name = team_name.replace(/[^a-zA-Z0-9 ]+/g, "");
                team_name = team_name.replace(/\s+/g, "-");
                $('#uri').val(team_name);
            });
        });
    </script>
@endsection
