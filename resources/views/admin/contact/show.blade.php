@extends('admin.master')
@section('title', 'Contact Details')
@section('breadcrumb')
    <a href="{{ route('contact-inquiry.index') }}" class="btn btn-primary btn-sm">
        Go Back
    </a>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Contact Details</span>
            </div>
            <div class="panel-body">
                <table class="table admin-form table-striped">
                    <tbody>
                        <tr>
                            <td width="30%">Full Name</td>
                            <td>{{ $data->full_name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $data->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $data->number ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $data->country ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Subject / Title</td>
                            <td>{{ $data->title ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Trip</td>
                            <td>{{ $data->trip ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{!! nl2br(e($data->message ?? '-')) !!}</td>
                        </tr>
                        <tr>
                            <td>Submitted At</td>
                            <td>
                                {{ $data->created_at ? $data->created_at->format('d M Y h:i A') : '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
