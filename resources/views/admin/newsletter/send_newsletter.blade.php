@extends('admin.master')
@section('title', 'Send Newsletter')
@section('breadcrumb')
    <button type="button" class="btn btn-sm btn-success send-email">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        Send Email
    </button>
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Send Newsletter</span>
        </div>
        <div class="panel-body ph20">
            {{-- Newsletter Selection --}}
            <div class="form-group">
                <label for="news">
                    Newsletter <span class="text-danger">*</span>
                </label>
                <select name="news_id" class="form-control" id="news">
                    <option value="" selected disabled>Select Newsletter</option>
                    @foreach ($news as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            {{-- Subscribers --}}
            <div class="clearfix" style="margin-bottom:15px;">
                <strong>Subscribers</strong>
                <label style="margin-left:20px; font-weight:normal;">
                    <input type="checkbox" id="checkAll">
                    Check All
                </label>
            </div>
            <div class="table-responsive">
                <table class="table admin-form table-striped dataTable" id="datatable3">
                    <thead>
                        <tr class="bg-light">
                            <th width="8%">Select</th>
                            <th width="35%">Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}">
                                </td>
                                <td>
                                    {{ $user->name ?? '-' }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            <div class="text-center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('libraries')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Check / Uncheck all subscribers
            $("#checkAll").on('click', function () {
                $('.user-checkbox').prop('checked', this.checked);
            });
            // Automatically update Check All when individual checkboxes change
            $('.user-checkbox').on('change', function () {
                if ($('.user-checkbox:checked').length === $('.user-checkbox').length) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
            });
            // CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Send newsletter
            $(".send-email").on('click', function () {
                var selectedUsers = $('.user-checkbox:checked');
                var selectRowsCount = selectedUsers.length;
                var news_id = $('#news').val();
                if (!news_id) {
                    toastr.warning('Please select a newsletter.');
                    return;
                }
                if (selectRowsCount === 0) {
                    toastr.warning('Please select at least one subscriber.');
                    return;
                }
                var ids = $.map(selectedUsers, function (checkbox) {
                    return checkbox.value;
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.send.email') }}",
                    data: {
                        ids: ids,
                        news_id: news_id
                    },
                    beforeSend: function () {
                        $('.send-email')
                            .prop('disabled', true)
                            .html('<i class="fa fa-spinner fa-spin"></i> Sending...');
                    },
                    success: function (data) {
                        toastr.success(data.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (xhr) {
                        $('.send-email')
                            .prop('disabled', false)
                            .html('<i class="fa fa-paper-plane"></i> Send Email');
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            toastr.error(xhr.responseJSON.message);
                        } else {
                            toastr.error('An error occurred while sending the newsletter.');
                        }
                    }
                });
            });
        });
    </script>
@endsection
