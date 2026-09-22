<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use App\Model\Contact;
use App\Models\Inquiry\BookingModel;
use App\Model\TripReview;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Basic Statistics
        |--------------------------------------------------------------------------
        */
        $total_posts = PostModel::count();
        $total_trips = TripModel::count();
        $total_inquires = Contact::count();
        $total_booking = BookingModel::count();
        $total_reviews = TripReview::count();
        /*
        |--------------------------------------------------------------------------
        | Booking Status
        |--------------------------------------------------------------------------
        */
        $pending_bookings = BookingModel::where('status', 'pending')->count();
        $confirmed_bookings = BookingModel::where('status', 'Confirmed')->count();
        $completed_bookings = BookingModel::where('status', 'Completed')->count();
        $cancelled_bookings = BookingModel::where('status', 'cancelled')->count();
        /*
        |--------------------------------------------------------------------------
        | Booking Type
        |--------------------------------------------------------------------------
        */
        $group_bookings = BookingModel::where('type', 'Group')->count();
        $private_bookings = BookingModel::where('type', 'Private')->count();
        /*
        |--------------------------------------------------------------------------
        | Current Month Statistics
        |--------------------------------------------------------------------------
        */
        $current_month_bookings = BookingModel::whereMonth(
            'created_at',
            now()->month
        )
            ->whereYear(
                'created_at',
                now()->year
            )
            ->count();
        $current_month_inquires = Contact::whereMonth(
            'created_at',
            now()->month
        )
            ->whereYear(
                'created_at',
                now()->year
            )
            ->count();
        $current_month_reviews = TripReview::whereMonth(
            'created_at',
            now()->month
        )
            ->whereYear(
                'created_at',
                now()->year
            )
            ->count();
        /*
        |--------------------------------------------------------------------------
        | Monthly Booking / Inquiry Chart
        |--------------------------------------------------------------------------
        */
        $months = [];
        $booking_chart = [];
        $inquiry_chart = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->format('M');
            $booking_chart[] = BookingModel::whereMonth(
                'created_at',
                $date->month
            )
                ->whereYear(
                    'created_at',
                    $date->year
                )
                ->count();
            $inquiry_chart[] = Contact::whereMonth(
                'created_at',
                $date->month
            )
                ->whereYear(
                    'created_at',
                    $date->year
                )
                ->count();
        }
        /*
        |--------------------------------------------------------------------------
        | Recent Bookings
        |--------------------------------------------------------------------------
        */
        $recent_bookings = BookingModel::latest()
            ->take(5)
            ->get();
        /*
        |--------------------------------------------------------------------------
        | Recent Inquiries
        |--------------------------------------------------------------------------
        */
        $recent_inquires = Contact::latest()
            ->take(5)
            ->get();
        /*
        |--------------------------------------------------------------------------
        | Recent Reviews
        |--------------------------------------------------------------------------
        */
        $recent_reviews = TripReview::latest()
            ->take(5)
            ->get();
        /*
        |--------------------------------------------------------------------------
        | Needs Attention
        |--------------------------------------------------------------------------
        |
        | Since Contact status field is not provided, we only use
        | pending bookings here.
        |
        */
        $needs_attention = [
            'pending_bookings' => $pending_bookings,
        ];
        return view('admin.dashboard', compact(
            'total_posts',
            'total_trips',
            'total_inquires',
            'total_booking',
            'total_reviews',
            'pending_bookings',
            'confirmed_bookings',
            'completed_bookings',
            'cancelled_bookings',
            'group_bookings',
            'private_bookings',
            'current_month_bookings',
            'current_month_inquires',
            'current_month_reviews',
            'months',
            'booking_chart',
            'inquiry_chart',
            'recent_bookings',
            'recent_inquires',
            'recent_reviews',
            'needs_attention'
        ));
    }
}
