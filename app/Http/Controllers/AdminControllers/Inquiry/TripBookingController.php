<?php

namespace App\Http\Controllers\AdminControllers\Inquiry;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry\BookingModel;

class TripBookingController extends Controller
{
    public function index()
    {
        $data = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.index', compact('data'));
    }
    public function show($id)
    {
        $data = Contact::findOrFail($id);
        return view('admin.contact.show', compact('data'));
    }
    public function destroy($id)
    {
        $del = Contact::findOrFail($id);
        $del->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully');
    }

    // Trip Planning
    public function trip_planning(Request $request)
    {
        if ($request->isMethod('get')) {
            $book = BookingModel::orderby('id', 'desc')->get();

            return view('admin.trip-planning.index', compact('book'));
        }
    }
    public function view_trip_planning($id)
    {
        $book = BookingModel::where('id', $id)->first();
        // dd($book);
        return view('admin.trip-planning.show', compact('book'));
    }

    public function update_planning_status(Request $request, $id)
    {
        $booking = BookingModel::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);
        $booking->status = $request->status;
        $booking->save();

        return redirect()
            ->back()
            ->with('success', 'Booking status updated successfully.');
    }

    public function trip_planning_delete(Request $request)
    {
        $del = BookingModel::findorfail($request->id);

        if ($del->delete()) {
            return redirect()->back()->with('success', 'Booking deleted  successfully');
        }
    }

    // Trip Booking
    public function trip_booking(Request $request)
    {
        if ($request->isMethod('get')) {
            $book = BookingModel::orderby('id', 'desc')->get();

            return view('admin.trip-booking.index', compact('book'));
        }
    }

    public function view_trip_booking($id)
    {
        $book = BookingModel::where('id', $id)->first();
        // dd($book);
        return view('admin.trip-booking.show', compact('book'));
    }

    public function update_status(Request $request, $id)
    {
        $booking = BookingModel::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);
        $booking->status = $request->status;
        $booking->save();

        return redirect()
            ->back()
            ->with('success', 'Booking status updated successfully.');
    }

    public function trip_booking_delete(Request $request)
    {
        $del = BookingModel::findorfail($request->id);

        if ($del->delete()) {
            return redirect()->back()->with('success', 'Booking deleted  successfully');
        }
    }
}
