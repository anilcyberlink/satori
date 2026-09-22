@extends('admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        {{-- TOTAL TRIPS --}}
        <div class="col-sm-6 col-md-3">
            <div class="dashboard-card card-blue">
                <div class="card-content">
                    <h2>{{ $total_trips }}</h2>
                    <p>Total Trips</p>
                </div>
                <i class="fa fa-map-marker card-icon"></i>
                <div class="card-footer">
                    {{ $total_trips }} trips available
                </div>
            </div>
        </div>
        {{-- TOTAL INQUIRIES --}}
        <div class="col-sm-6 col-md-3">
            <div class="dashboard-card card-orange">
                <div class="card-content">
                    <h2>{{ $total_inquires }}</h2>
                    <p>Total Inquiries</p>
                </div>
                <i class="fa fa-envelope card-icon"></i>
                <div class="card-footer">
                    {{ $current_month_inquires }} this month
                </div>
            </div>
        </div>
        {{-- TOTAL BOOKINGS --}}
        <div class="col-sm-6 col-md-3">
            <div class="dashboard-card card-green">
                <div class="card-content">
                    <h2>{{ $total_booking }}</h2>
                    <p>Total Bookings</p>
                </div>
                <i class="fa fa-calendar-check-o card-icon"></i>
                <div class="card-footer">
                    {{ $current_month_bookings }} this month
                </div>
            </div>
        </div>
        {{-- TOTAL REVIEWS --}}
        <div class="col-sm-6 col-md-3">
            <div class="dashboard-card card-purple">
                <div class="card-content">
                    <h2>{{ $total_reviews }}</h2>
                    <p>Total Reviews</p>
                </div>
                <i class="fa fa-star card-icon"></i>
                <div class="card-footer">
                    {{ $current_month_reviews }} added this month
                </div>
            </div>
        </div>
    </div>
    {{-- CHART + BOOKING STATUS --}}
    {{-- CHART + RIGHT SIDEBAR --}}
    <div class="row">
        {{-- LEFT COLUMN --}}
        <div class="col-md-8">
            {{-- BOOKING & INQUIRY CHART --}}
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-line-chart"></i>
                    Booking & Inquiry Overview
                </div>
                <div class="panel-body chart-panel-body">
                    <div class="chart-container">
                        <canvas id="bookingInquiryChart"></canvas>
                    </div>
                </div>
            </div>
            {{-- RECENT BOOKINGS --}}
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-calendar-check-o"></i>
                    Recent Bookings
                </div>
                <div class="table-responsive">
                    <table class="table table-hover dashboard-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Trip</th>
                                <th>Type</th>
                                <th>Travellers</th>
                                <th>Departure</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_bookings as $booking)
                                                @php
                                                    $status = strtolower($booking->status ?? 'pending');
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            {{ $booking->full_name ?? 'N/A' }}
                                                        </strong>
                                                        <small class="table-subtext">
                                                            {{ $booking->email ?? '' }}
                                                        </small>
                                                    </td>
                                                    <td>
                                                        {{ $booking->trip_title ?? 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <span class="booking-type">
                                                            {{ $booking->type ?? 'N/A' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ $booking->total_travellers ?? 0 }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->departure_date
                                ? \Carbon\Carbon::parse($booking->departure_date)->format('d M Y')
                                : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <span class="status-badge status-{{ $status }}">
                                                            {{ ucfirst($booking->status ?? 'Pending') }}
                                                        </span>
                                                    </td>
                                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fa fa-calendar-o"></i>
                                            <p>No bookings found.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- RIGHT COLUMN --}}
        <div class="col-md-4">
            {{-- BOOKING STATUS --}}
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-calendar"></i>
                    Booking Status
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-3 status-column">
                            <span class="status-number">
                                {{ $pending_bookings }}
                            </span>
                            <span class="status-label">
                                Pending
                            </span>
                        </div>
                        <div class="col-xs-3 status-column">
                            <span class="status-number">
                                {{ $confirmed_bookings }}
                            </span>
                            <span class="status-label">
                                Confirmed
                            </span>
                        </div>
                        <div class="col-xs-3 status-column">
                            <span class="status-number">
                                {{ $completed_bookings }}
                            </span>
                            <span class="status-label">
                                Completed
                            </span>
                        </div>
                        <div class="col-xs-3 status-column">
                            <span class="status-number">
                                {{ $cancelled_bookings }}
                            </span>
                            <span class="status-label">
                                Cancelled
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- BOOKING TYPE --}}
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-users"></i>
                    Booking Type
                </div>
                <div class="panel-body">
                    <div class="booking-type-row">
                        <div>
                            <span class="type-icon group-icon">
                                <i class="fa fa-users"></i>
                            </span>
                            <strong>Group</strong>
                        </div>
                        <span class="type-count">
                            {{ $group_bookings }}
                        </span>
                    </div>
                    <div class="booking-type-row">
                        <div>
                            <span class="type-icon private-icon">
                                <i class="fa fa-user"></i>
                            </span>
                            <strong>Private</strong>
                        </div>
                        <span class="type-count">
                            {{ $private_bookings }}
                        </span>
                    </div>
                </div>
            </div>
            {{-- NEEDS ATTENTION --}}
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-exclamation-circle"></i>
                    Needs Attention
                </div>
                <div class="panel-body">
                    <div class="attention-item">
                        <div class="attention-icon attention-warning">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="attention-content">
                            <strong>Pending Bookings</strong>
                            <span>Requires confirmation</span>
                        </div>
                        <div class="attention-count">
                            {{ $pending_bookings }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- RECENT REVIEWS --}}
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-star"></i>
                    Recent Reviews
                </div>
                <div class="panel-body review-list">
                    @forelse($recent_reviews as $review)
                        <div class="review-item">
                            <div class="review-header">
                                <strong>
                                    {{ $review->full_name ?? 'Anonymous' }}
                                </strong>
                                <span class="review-rating">
                                    @php
                                        $rating = (int) ($review->rating ?? 0);
                                    @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        {{ $i <= $rating ? '★' : '☆' }}
                                    @endfor
                                </span>
                            </div>
                            <small class="review-trip">
                                {{ $review->trip_title ?? '' }}
                            </small>
                            <p>
                                {{ \Illuminate\Support\Str::limit($review->message ?? '', 80) }}
                            </p>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="fa fa-star-o"></i>
                            <p>No reviews found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- RECENT INQUIRIES --}}
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-envelope"></i>
                    Recent Inquiries
                </div>
                <div class="table-responsive">
                    <table class="table table-hover dashboard-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_inquires as $inquiry)
                                <tr>
                                    <td>
                                        {{ $inquiry->name ?? $inquiry->full_name ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $inquiry->email ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $inquiry->phone ?? $inquiry->number ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $inquiry->subject ?? 'General Inquiry' }}
                                    </td>
                                    <td>
                                        {{ optional($inquiry->created_at)->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            <i class="fa fa-envelope-o"></i>
                                            <p>No inquiries found.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('bookingInquiryChart');
            if (!canvas) {
                return;
            }
            new Chart(canvas, {
                type: 'line',
                data: {
                    labels: @json($months),
                    datasets: [
                        {
                            label: 'Bookings',
                            data: @json($booking_chart),
                            borderWidth: 2,
                            fill: false,
                            tension: 0.3
                        },
                        {
                            label: 'Inquiries',
                            data: @json($inquiry_chart),
                            borderWidth: 2,
                            fill: false,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 5,
                            right: 5,
                            bottom: 0,
                            left: 5
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
@section('additional-css')
    <style>
        .dashboard-card {
            border: 0;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            color: #fff;
            min-height: 125px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
        }

        .dashboard-card .card-content {
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .dashboard-card h2 {
            margin: 0 0 5px;
            font-size: 30px;
            font-weight: 600;
            color: #fff;
        }

        .dashboard-card p {
            margin: 0;
            font-size: 14px;
            color: rgba(255, 255, 255, .85);
        }

        .dashboard-card .card-icon {
            position: absolute;
            right: 15px;
            top: 18px;
            font-size: 65px;
            opacity: .15;
        }

        .dashboard-card .card-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 6px 20px;
            background: rgba(0, 0, 0, .08);
            font-size: 12px;
            color: rgba(255, 255, 255, .9);
        }

        .card-blue {
            background: #337ab7;
        }

        .card-green {
            background: #28a745;
        }

        .card-orange {
            background: #f0ad4e;
        }

        .card-purple {
            background: #8064a2;
        }

        .dashboard-panel {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            margin-bottom: 20px;
            box-shadow: 0 2px 7px rgba(0, 0, 0, .04);
        }

        .dashboard-panel .panel-heading {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 15px 18px;
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        .dashboard-panel .panel-heading i {
            margin-right: 7px;
            color: #337ab7;
        }

        .dashboard-panel .panel-body {
            padding: 18px;
        }

        .chart-panel-body {
            padding: 12px 15px 10px !important;
        }

        .chart-container {
            height: 230px;
            width: 100%;
            position: relative;
        }

        .status-column {
            text-align: center;
            padding: 10px 4px;
            border-right: 1px solid #eee;
        }

        .status-column:last-child {
            border-right: 0;
        }

        .status-number {
            display: block;
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .status-label {
            display: block;
            margin-top: 4px;
            font-size: 11px;
            color: #888;
        }

        .booking-type-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .booking-type-row:last-child {
            border-bottom: 0;
        }

        .type-icon {
            display: inline-block;
            width: 32px;
            height: 32px;
            line-height: 32px;
            text-align: center;
            border-radius: 50%;
            margin-right: 8px;
        }

        .group-icon {
            background: #e8f2fb;
            color: #337ab7;
        }

        .private-icon {
            background: #eee9f7;
            color: #8064a2;
        }

        .type-count {
            font-size: 18px;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 9px;
            border-radius: 3px;
            font-size: 11px;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #d4edda;
            color: #155724;
        }

        .status-completed {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .status-default {
            background: #eee;
            color: #555;
        }

        .dashboard-table {
            margin-bottom: 0;
        }

        .dashboard-table th {
            font-size: 12px;
            color: #777;
            font-weight: 600;
            border-top: 0 !important;
            white-space: nowrap;
        }

        .dashboard-table td {
            vertical-align: middle !important;
            font-size: 13px;
        }

        .table-subtext {
            display: block;
            color: #999;
            font-size: 11px;
            margin-top: 3px;
        }

        .booking-type {
            font-size: 11px;
            color: #666;
        }

        .attention-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
        }

        .attention-icon {
            width: 35px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            border-radius: 50%;
            margin-right: 10px;
        }

        .attention-warning {
            background: #fff3cd;
            color: #f0ad4e;
        }

        .attention-content {
            flex: 1;
        }

        .attention-content strong {
            display: block;
            color: #333;
            font-size: 13px;
        }

        .attention-content span {
            font-size: 11px;
            color: #999;
        }

        .attention-count {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .review-item {
            padding: 11px 0;
            border-bottom: 1px solid #eee;
        }

        .review-item:last-child {
            border-bottom: 0;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .review-rating {
            color: #f0ad4e;
            font-size: 12px;
        }

        .review-trip {
            color: #999;
        }

        .review-item p {
            margin: 5px 0 0;
            color: #666;
            font-size: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 25px;
            color: #999;
        }

        .empty-state i {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .empty-state p {
            margin: 0;
        }
    </style>
@endsection
