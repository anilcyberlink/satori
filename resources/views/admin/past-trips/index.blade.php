@extends('admin.master')

@section('title', Request::segment(2))

@section('breadcrumb')
    <a href="{{ route('pasttrip.create', $trip->id) }}" class="btn btn-primary btn-sm">
        Create
    </a>
@endsection

@section('content')
    <div id="status-message" class="alert alert-success" style="display:none;">
        <span id="status-message-text"></span>
        <button type="button" class="close" onclick="$('#status-message').hide();">×</button>
    </div>
    <section class="table-layout animated fadeIn">
        <div>
            <h4>
                Past Trips of
                <em>{{ ucfirst($trip->trip_title) }}</em>
            </h4>
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table
                            class="table admin-form table-striped dataTable"
                            id="datatable3"
                        >
                            <thead>
                                <tr class="bg-light">
                                    <th style="width:5%;">SN</th>
                                    <th style="width:40%;">Title</th>
                                    <th style="width:20%;">Add Image</th>
                                    <th style="width:10%;" class="text-center">Status</th>
                                    <th style="width:10%;" class="text-center">Order</th>
                                    <th style="width:15%;" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr class="id{{ $item->id }}">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ ucfirst($item->title) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('pasttrip.image.create',$item->id) }}">
                                                <i class="fa fa-folder-open"></i>[Add Images]
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <input
                                                class="CheckStatus"
                                                type="checkbox"
                                                name="status"
                                                data-rowid="{{ $item->id }}"
                                                {{ $item->status == 1 ? 'checked' : '' }}
                                            />
                                        </td>
                                        <td class="text-center">
                                            {{ $item->ordering ?? '-' }}
                                        </td>

                                        <td class="text-center">

                                            <a
                                                href="{{ route('pasttrip.edit', $item->id) }}"
                                                class="btn btn-xs btn-primary"
                                            >
                                                Edit
                                            </a>
                                            <form action="{{ route('pasttrip.destroy', $item->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this past trip?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('libraries')

    <!-- Datatables -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>

    <!-- Datatables ColReorder addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>

    <!-- Datatables Bootstrap Modifications -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">

        (function($) {

            $('.CheckStatus').on('click',function(){
                var checkbox=$(this);
                var csrf=$('meta[name="csrf-token"]').attr('content');
                var id=checkbox.attr('data-rowid');
                var url='{{ route('pasttrip.status',['id'=>':id']) }}';
                url=url.replace(':id',id);
                $.ajax({
                    type:'put',
                    url:url,
                    data:{_token:csrf},
                    success:function(data){
                        if(data.success){
                            $('#status-message-text').text(data.message);
                            $('#status-message').fadeIn();
                            setTimeout(function(){
                                $('#status-message').fadeOut();
                            },3000);
                        }
                    },
                    error:function(data){
                        checkbox.prop('checked',!checkbox.prop('checked'));
                    }
                });
            });

        }(jQuery));


        /*
        |--------------------------------------------------------------------------
        | DataTable
        |--------------------------------------------------------------------------
        */

        $(document).ready(function() {

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

                "iDisplayLength": 30,

                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],

                "sDom":
                    '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',

                "oTableTools": {
                    "sSwfPath":
                        "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
                }

            });

        });

    </script>

@endsection
