@extends('admin.master')
@section('title', 'Trip Review')
@section('breadcrumb')
    <a href="{{ route('post-trip-review') }}" class="btn btn-primary btn-sm">
        Create</a>
@endsection
@section('content')
    <div id="status-message" class="alert alert-success" style="display:none;">
        <span id="status-message-text"></span>
        <button type="button" class="close" onclick="$('#status-message').hide();">×</button>
    </div>
    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Reviews </span>
            </div>
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form table-striped dataTable" id="datatable3">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="">SN</th>
                                        <th class="">Trip</th>
                                        <th class="">Full Name</th>
                                        <th class="text-center">Votes</th>
                                        <th class="text-center">Status </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($review) > 0)
                                        @foreach ($review as $key => $row)
                                            <tr class="bg-light">
                                                <td class="">{{ $key += 1 }}</td>
                                                <td class="">
                                                    {{ $row->trips ? $row->trips->trip_title : 'No Trip Selected' }}</td>
                                                <td >
                                                    {{ ucfirst($row->full_name) }}
                                                </td>
                                                <td class="text-center">
                                                    {{ ucfirst($row->usefulness) }}
                                                </td>

                                                <td class="text-center">
                                                    <input type="checkbox" class="CheckStatus"
                                                        data-rowid="{{ $row->id }}"
                                                        {{ $row->status == 1 ? 'checked' : '' }}>
                                                </td>

                                                <td class="text-center">
                                                    <span>
                                                        <a href="{{ url('admin-trip-view-review' . '/' . $row->id . '/view/') }}">View</a></span> |
                                                    <span class="edit"><a
                                                            href="{{ url('admin-trip-edit-review' . '/' . $row->id . '/edit/') }}">Edit
                                                        </a></span> |
                                                    <span class="trash">
                                                        <a href="{{ route('delete-trip-review', $row->id) }}"
                                                            onclick="return confirm('Confirm Delete?')"
                                                            class="btn-btn-danger"> Delete</a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('libraries')
    <!-- Datatables -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>

    <!-- Datatables ColReorder addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>

    <!-- Datatables Bootstrap Modifications  -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                if (!confirm('Are you sure to delete?')) return false;
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var str = $(this).attr('href');
                var id = str.slice(1);
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('admin/teams') . '/' }}" + id,
                    data: {
                        _token: csrf
                    },
                    success: function(data) {
                        $('tbody tr.id' + id).remove();
                    },
                    error: function(data) {
                        alert('Error occurred!');
                    }
                });
            });
        });

        /************/
        $('#datatable3').dataTable({
            "aoColumnDefs": [{
                'bSortable': true,
                'aTargets': [-1]

            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "Previous",
                    "sNext": "Next"
                }
            },
            "iDisplayLength": 20,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
            }
        });
    </script>
    <script>
        $(document).on('change', '.CheckStatus', function() {
            let checkbox = $(this);
            let rowId = checkbox.data('rowid');
            let status = checkbox.is(':checked') ? 1 : 0;
            $.ajax({
                url: "{{ route('review-status') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    status: rowId,
                    status_value: status
                },
                success: function(response) {
                    if (response.success) {
                        $('#status-message')
                            .removeClass('alert-danger')
                            .addClass('alert-success');
                        $('#status-message-text').text(response.message);
                        $('#status-message').fadeIn();
                        setTimeout(function() {
                            $('#status-message').fadeOut();
                        }, 3000);
                    }
                },
                error: function() {
                    // Revert checkbox if update fails
                    checkbox.prop('checked', !checkbox.is(':checked'));
                    $('#status-message')
                        .removeClass('alert-success')
                        .addClass('alert-danger');
                    $('#status-message-text').text('Unable to update status.');
                    $('#status-message').fadeIn();
                }
            });
        });
    </script>
@endsection
