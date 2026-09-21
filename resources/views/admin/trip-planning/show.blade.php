@extends('admin.master')
@section('title', 'Trip planning')
@section('breadcrumb')
    <a href="{{ route('trip-planning') }}" class="btn btn-primary btn-sm">
        Go Back
    </a>
@endsection
@section('content')
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-body">
                {{-- Booking Information --}}
                <div class="col-lg-12">
                    <div class="bs-component">
                        <h3>Booking Information</h3>
                        <table class="table admin-form table-striped">
                            <tbody>
                                <tr>
                                    <td>Trip Name</td>
                                    <td>{{ $book->trip_title ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Booking Type</td>
                                    <td>{{ $book->type ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Total Travelers</td>
                                    <td>{{ $book->total_travellers ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if($book->status == 'pending')
                                            <span class="label label-warning">Pending</span>
                                        @elseif($book->status == 'confirmed')
                                            <span class="label label-success">Confirmed</span>
                                        @elseif($book->status == 'cancelled')
                                            <span class="label label-danger">Cancelled</span>
                                        @elseif($book->status == 'completed')
                                            <span class="label label-primary">Completed</span>
                                        @else
                                            <span class="label label-default">
                                                {{ ucfirst($book->status ?? '-') }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Terms Accepted</td>
                                    <td>
                                        {{ $book->terms_accepted == 1 ? 'Yes' : 'No' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Booking Date</td>
                                    <td>
                                        {{ $book->created_at ? $book->created_at->format('M d, Y h:i A') : '-' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Customer Information --}}
                <div class="col-lg-12">
                    <div class="bs-component">
                        <h3>Customer Information</h3>
                        <table class="table admin-form table-striped">
                            <tbody>
                                <tr>
                                    <td width="30%">Full Name</td>
                                    <td>{{ $book->full_name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $book->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $book->phone ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $book->country ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Travel Information --}}
                <div class="col-lg-12">
                    <div class="bs-component">
                        <h3>Travel Information</h3>
                        <table class="table admin-form table-striped">
                            <tbody>
                                <tr>
                                    <td width="30%">Arrival Date</td>
                                    <td>{{ $book->arrival_date ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Departure Date</td>
                                    <td>{{ $book->departure_date ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Remark --}}
                <div class="col-lg-12">
                    <div class="bs-component">
                        <h3>Additional Information</h3>
                        <table class="table admin-form table-striped">
                            <tbody>
                                <tr>
                                    <td width="30%">Remark</td>
                                    <td>
                                        @if($book->remark)
                                            {!! nl2br(e($book->remark)) !!}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Booking Status</span>
            </div>
            <div class="panel-body">
                <form action="{{ route('update-trip-planning-status', $book->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $book->status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="confirmed" {{ $book->status == 'confirmed' ? 'selected' : '' }}>
                                Confirmed
                            </option>
                            <option value="cancelled" {{ $book->status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                            <option value="completed" {{ $book->status == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
