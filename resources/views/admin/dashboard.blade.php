@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        {{-- ============================= --}}
        {{-- TOP SUMMARY CARDS --}}
        {{-- ============================= --}}
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
        <div class="col-sm-6 col-md-3">
            <div class="dashboard-card card-orange">
                <div class="card-content">
                    <h2>{{ $total_inquires }}</h2>
                    <p>Total Inquiries</p>
                </div>
                <i class="fa fa-envelope card-icon"></i>
                <div class="card-footer">
                    {{ $new_inquires }} new inquiries
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="dashboard-card card-green">
                <div class="card-content">
                    <h2>{{ $total_booking }}</h2>
                    <p>Total Bookings</p>
                </div>
                <i class="fa fa-calendar-check-o card-icon"></i>
                <div class="card-footer">
                    {{ $confirmed_bookings }} confirmed
                </div>
            </div>
        </div>
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
    {{-- ============================= --}}
    {{-- BOOKING STATISTICS --}}
    {{-- ============================= --}}
    <div class="row">
        <div class="col-md-8">
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-line-chart"></i>
                    Booking & Inquiry Overview
                </div>
                <div class="panel-body">
                    <canvas id="bookingInquiryChart" height="105"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart"></i>
                    Booking Status
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4 stat-box">
                            <span class="number">{{ $pending_bookings }}</span>
                            <span class="label-text">Pending</span>
                        </div>
                        <div class="col-xs-4 stat-box">
                            <span class="number">{{ $confirmed_bookings }}</span>
                            <span class="label-text">Confirmed</span>
                        </div>
                        <div class="col-xs-4 stat-box">
                            <span class="number">{{ $cancelled_bookings }}</span>
                            <span class="label-text">Cancelled</span>
                        </div>
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
                        <div class="attention-icon attention-danger">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="attention-content">
                            <strong>New Inquiries</strong>
                            <span>Requires response</span>
                        </div>
                        <div class="attention-count">
                            {{ $new_inquires }}
                        </div>
                    </div>
                    <div class="attention-item">
                        <div class="attention-icon attention-warning">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="attention-content">
                            <strong>Pending Bookings</strong>
                            <span>Requires confirmation</span>
                        </div>
                        <div class="attention-count">
                            {{ $pending_bookings }}
                        </div>
                    </div>
                    <div class="attention-item">
                        <div class="attention-icon attention-info">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="attention-content">
                            <strong>Pending Inquiries</strong>
                            <span>Follow-up required</span>
                        </div>
                        <div class="attention-count">
                            {{ $pending_inquires }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ============================= --}}
    {{-- RECENT BOOKINGS --}}
    {{-- ============================= --}}
    <div class="row">
        <div class="col-md-8">
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-calendar-check-o"></i>
                    Recent Bookings
                    {{-- CHANGE ROUTE NAME --}}
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover dashboard-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Trip</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_bookings as $booking)
                                <tr>
                                    <td>
                                        {{-- CHANGE FIELD --}}
                                        {{ $booking->name ?? ($booking->full_name ?? 'N/A') }}
                                    </td>
                                    <td>
                                        {{-- CHANGE FIELD --}}
                                        {{ $booking->trip_title ?? ($booking->trip_name ?? 'N/A') }}
                                    </td>
                                    <td>
                                        {{ optional($booking->created_at)->format('d M Y') }}
                                    </td>
                                    <td>
                                        @php
                                            $status = strtolower($booking->status ?? 'pending');
                                        @endphp
                                        <span class="status-badge status-{{ $status }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            No bookings found.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- REVIEW SUMMARY --}}
        <div class="col-md-4">
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-star"></i>
                    Recent Reviews
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="panel-body">
                    @forelse($recent_reviews as $review)
                        <div style="padding:10px 0;border-bottom:1px solid #eee;">
                            <strong>
                                {{ $review->full_name ?? ($review->name ?? 'Anonymous') }}
                            </strong>
                            <div class="rating">
                                @php
                                    $rating = (int) ($review->rating ?? 0);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </div>
                            <small class="text-muted">
                                {{ \Illuminate\Support\Str::limit($review->message ?? ($review->comment ?? ''), 70) }}
                            </small>
                        </div>
                    @empty
                        <div class="empty-state">
                            No reviews found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{-- ============================= --}}
    {{-- RECENT INQUIRIES --}}
    {{-- ============================= --}}
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-panel">
                <div class="panel-heading">
                    <i class="fa fa-envelope"></i>
                    Recent Inquiries
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover dashboard-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject / Trip</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_inquires as $inquiry)
                                <tr>
                                    <td>
                                        {{-- CHANGE FIELD --}}
                                        {{ $inquiry->name ?? ($inquiry->full_name ?? 'N/A') }}
                                    </td>
                                    <td>
                                        {{-- CHANGE FIELD --}}
                                        {{ $inquiry->email ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{-- CHANGE FIELD --}}
                                        {{ $inquiry->subject ?? ($inquiry->trip_title ?? 'General Inquiry') }}
                                    </td>
                                    <td>
                                        {{ optional($inquiry->created_at)->format('d M Y') }}
                                    </td>
                                    <td>
                                        @php
                                            $status = strtolower($inquiry->status ?? 'new');
                                        @endphp
                                        <span class="status-badge status-{{ $status }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            No inquiries found.
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
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('bookingInquiryChart');
            if (!ctx) {
                return;
            }
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($months),
                    datasets: [{
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
    box-shadow: 0 2px 8px rgba(0,0,0,.08);
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
    color: rgba(255,255,255,.85);
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
    background: rgba(0,0,0,.08);
    font-size: 12px;
    color: rgba(255,255,255,.9);
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
    box-shadow: 0 2px 7px rgba(0,0,0,.04);
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
    .stat-box {
    text-align: center;
    padding: 10px 5px;
    border-right: 1px solid #eee;
    }
    .stat-box:last-child {
    border-right: 0;
    }
    .stat-box .number {
    display: block;
    font-size: 25px;
    font-weight: 600;
    color: #333;
    }
    .stat-box .label-text {
    display: block;
    margin-top: 4px;
    font-size: 12px;
    color: #888;
    }
    .status-badge {
    display: inline-block;
    padding: 4px 9px;
    border-radius: 3px;
    font-size: 11px;
    text-transform: capitalize;
    }
    .status-pending {
    background: #fff3cd;
    color: #856404;
    }
    .status-confirmed {
    background: #d4edda;
    color: #155724;
    }
    .status-cancelled {
    background: #f8d7da;
    color: #721c24;
    }
    .status-new {
    background: #d9edf7;
    color: #31708f;
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
    }
    .dashboard-table td {
    vertical-align: middle !important;
    font-size: 13px;
    }
    .attention-item {
    display: flex;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
    }
    .attention-item:last-child {
    border-bottom: 0;
    }
    .attention-icon {
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    border-radius: 50%;
    margin-right: 10px;
    }
    .attention-danger {
    background: #f8d7da;
    color: #dc3545;
    }
    .attention-warning {
    background: #fff3cd;
    color: #f0ad4e;
    }
    .attention-info {
    background: #d9edf7;
    color: #337ab7;
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
    .rating {
    color: #f0ad4e;
    letter-spacing: 1px;
    }
    .view-all {
    float: right;
    font-size: 12px;
    font-weight: normal;
    }
    .empty-state {
    text-align: center;
    padding: 25px;
    color: #999;
    }
    </style>
@endsection
