@extends('admin.master')
@section('title', 'Team')
@section('breadcrumb')
    <a href="{{ route('teams.create') }}" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
    <div id="status-message" class="alert alert-success" style="display:none;">
        <span id="status-message-text"></span>
        <button type="button" class="close" onclick="$('#status-message').hide();">×</button>
    </div>
    <div class="tray tray-center" style="height: 647px;">
        <div class="tab-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="bs-component">
                        <div class="panel">
                            <div class="panel-heading">
                                <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                                    @if ($categories->count() > 0)
                                        @foreach ($categories as $key => $category)
                                            <li class="{{ $key == 0 ? 'active' : '' }}">
                                                <a href="#tab_{{ $category->id }}" data-toggle="tab">
                                                    {{ $category->category }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="">
                                            <a>
                                                Please first create team categories
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                    @foreach ($categories as $key => $category)
                                        <div id="tab_{{ $category->id }}" class="tab-pane {{ $key == 0 ? 'active' : '' }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive mhn20 mvn15">
                                                        <table class="table admin-form theme-warning fs13 datatable"
                                                            id="datatable{{ $category->id }}">
                                                            <thead>
                                                                <tr class="bg-light">
                                                                    <th>SN</th>
                                                                    <th>Name</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th>Ordering</th>
                                                                    <th class="text-left">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($teams->get($category->id, collect()) as $row)
                                                                    <tr class="id{{ $row->id }}">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ ucfirst($row->name) }}</td>
                                                                        <td class="text-center">
                                                                            <input class="CheckStatus" type="checkbox"
                                                                                name="status"
                                                                                data-rowid="{{ $row->id }}"
                                                                                {{ $row->status == 1 ? 'checked' : '' }} />
                                                                        </td>
                                                                        <td>{{ $row->ordering }}</td>
                                                                        <td class="text-left">
                                                                            <a
                                                                                href="{{ url('admin/teams/' . $row->id . '/edit') }}">Edit</a>
                                                                            |
                                                                            <span class="trash">
                                                                                <a href="#{{ $row->id }}"
                                                                                    class="btn-delete">Delete</a>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('libraries')
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
@endsection
@section('scripts')
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
                    url: "{{ url('admin/teams') }}/" + id,
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
            $('.datatable').each(function() {
                $(this).dataTable({
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
            });
        });

        $(document).on('change', '.CheckStatus', function() {
            var checkbox = $(this);
            var id = checkbox.data('rowid');
            var status = checkbox.is(':checked') ? 1 : 0;
            $.ajax({
                url: "{{ route('teams.toggleStatus', ':id') }}".replace(':id', id),
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        $('#status-message-text').text(response.message);
                        $('#status-message').stop(true, true).fadeIn();
                        setTimeout(function() {
                            $('#status-message').fadeOut();
                        }, 3000);
                    } else {
                        checkbox.prop('checked', !checkbox.is(':checked'));
                    }
                },
                error: function(xhr) {
                    checkbox.prop('checked', !checkbox.is(':checked'));
                    $('#status-message')
                        .removeClass('alert-success')
                        .addClass('alert-danger');
                    $('#status-message-text').text('Error occurred while updating status.');
                    $('#status-message').stop(true, true).fadeIn();
                    setTimeout(function() {
                        $('#status-message').removeClass('alert-danger').addClass(
                            'alert-success');
                        $('#status-message').fadeOut();
                    }, 3000);
                }
            });
        });
    </script>
@endsection
