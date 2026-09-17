@extends('admin.master')
@section('title', 'Team Category')
@section('breadcrumb')
    <a href="{{ route('teamcategory.create') }}" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
    <div id="status-message" class="alert alert-success" style="display:none;">
        <span id="status-message-text"></span>
        <button type="button" class="close" onclick="$('#status-message').hide();">×</button>
    </div>

    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form theme-warning fs13">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="">SN</th>
                                        <th class="">Team Category</th>
                                        <th class="text-center">Status</th>
                                        <th class="">Ordering</th>
                                        <th class="text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $row)
                                            <tr class="id{{ $row->id }}">
                                                <td class="">{{ $loop->iteration }}</td>
                                                <td class="">{{ ucfirst($row->category) }}</td>
                                                <td class="text-center">
                                                    <input class="CheckStatus" type="checkbox" name="status"
                                                        data-rowid="{{ $row->id }}"
                                                        {{ $row->status == 1 ? 'checked' : '' }} />
                                                </td>
                                                <td>{{ $row->ordering }}</td>
                                                <td class="text-left">
                                                    <a href="{{ url('admin/teamcategory/' . $row->id . '/edit') }}">Edit</a>
                                                    @if (!is_empty_teamcategory($row->id))
                                                        |
                                                        <a href="#{{ $row->id }}" class="btn-delete">Delete</a>
                                                    @endif
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
                    url: "{{ url('admin/teamcategory') . '/' }}" + id,
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
    </script>
    <script>
        $(document).ready(function() {
            $('.CheckStatus').on('change', function() {
                var checkbox = $(this);
                var id = checkbox.data('rowid');
                var status = checkbox.is(':checked') ? 1 : 0;
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/teamcategory/status') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        $('#status-message-text').text(response.message);
                        $('#status-message').stop(true, true).fadeIn();
                        setTimeout(function() {
                            $('#status-message').fadeOut();
                        }, 3000);
                    },
                    error: function(xhr) {
                        checkbox.prop('checked', !checkbox.is(':checked'));
                        $('#status-message').removeClass('alert-success').addClass('alert-danger');
                        $('#status-message-text').text('Error updating status.');
                        $('#status-message').fadeIn();
                    }
                });
            });
        });
    </script>
@endsection
