@extends('admin.master')
@section('title', 'Contact Us')
@section('breadcrumb')
@endsection
@section('content')
    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Contact Inquiry</span>
            </div>
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="contacts" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form table-striped dataTable" id="datatable3">
                                <thead>
                                    <tr class="bg-light">
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Date</th>
                                        <th class="text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) > 0)
                                        @foreach($data as $key => $row)
                                            <tr class="bg-light">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $row->full_name }}
                                                </td>
                                                <td>
                                                    {{ $row->email }}
                                                </td>
                                                <td>
                                                    {{ $row->number }}
                                                </td>
                                                <td>
                                                    {{ $row->country ?? '-' }}
                                                </td>
                                                <td>
                                                    {{ $row->created_at ? $row->created_at->format('d M Y') : '-' }}
                                                </td>
                                                <td class="text-left">
                                                    <a href="{{ route('contact-inquiry.show', $row->id) }}">
                                                        View
                                                    </a>
                                                    |
                                                    <form action="{{ route('contact-inquiry.destroy', $row->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link" style="padding:0; color:red;"
                                                            onclick="return confirm('Are you sure you want to delete this contact?')">
                                                            Delete
                                                        </button>
                                                    </form>
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
            "iDisplayLength": 50,
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
