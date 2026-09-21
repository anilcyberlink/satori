@extends('admin.master')
@section('title', 'Trip planning')
@section('breadcrumb')
@endsection
@section('content')
    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Trip Planning</span>
            </div>
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="bookings" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form table-striped dataTable" id="datatable3">
                                <thead>
                                    <tr class="bg-light">
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Trip</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($book) > 0)
                                        @foreach($book as $key => $row)
                                            <tr class="bg-light">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <a href="{{ route('view-trip-planning', $row->id) }}">
                                                        {{ $row->full_name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $row->trip_title }}
                                                </td>
                                                <td>
                                                    @if($row->status == 'pending')
                                                        <span class="label label-warning">Pending</span>
                                                    @elseif($row->status == 'confirmed')
                                                        <span class="label label-success">Confirmed</span>
                                                    @elseif($row->status == 'cancelled')
                                                        <span class="label label-danger">Cancelled</span>
                                                    @elseif($row->status == 'completed')
                                                        <span class="label label-primary">Completed</span>
                                                    @else
                                                        <span class="label label-default">
                                                            {{ ucfirst($row->status) }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->type }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('view-trip-planning', $row->id) }}">
                                                        View
                                                    </a>
                                                    |
                                                    <span class="trash">
                                                        <a href="{{ route('delete-planning', $row->id) }}"
                                                            onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">
                                                            Delete
                                                        </a>
                                                    </span>
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
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
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
@endsection
