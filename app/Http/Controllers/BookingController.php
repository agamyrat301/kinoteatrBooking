<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Seans;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $keyword = null;
        $seans_start_date = null;
        $seans_id = null;

        if ($request->has('seans_start_date')) {
            $seans_start_date = $request->get('seans_start_date');
        }

        if ($request->has('seans_id')) {

            $seans_id = $request->get('seans_id');

        }

        if ($request->has('search_query')) {

            $keyword = strtolower($request->get('search_query'));

        }

            $bookings = Booking::when($keyword, function ($query, $keyword) {
                return $query->where(
                    function ($q) use ($keyword) {
                    return $q->where('booking_number', 'LIKE', "%$keyword%");
                })->orWhereHas('seans', function($query) use ($keyword){
                    $query->where('seans_number','LIKE', "%$keyword%");
                });

            })->when($seans_start_date, function ($query, $seans_start_date) {
                if (strlen($seans_start_date) == 10) {

                    return $query->whereDate('created_at', $seans_start_date);
                    
                } else {
                    $from = substr($seans_start_date, 0, 10);
                    $to = substr($seans_start_date, 13, 24);
                    return $query->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to);
                }

            })->when($seans_id, function ($query, $seans_id) {
                return $query->where(
                    function ($q) use ($seans_id) {
                    return $q->where('seans_id', $seans_id);
                });

             })->orderBy('created_at', 'DESC')->paginate(10);
          
        return view('admin.bookings.index')
            ->with('seans_id', $seans_id)
            ->with('bookings', $bookings)
            ->with('seans_start_date', $seans_start_date)
            ->with('keyword', $keyword);
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $booking = Booking::create([
            'spot_id'=> $request->spot_id,
            'seans_id'=> $request->seans_id,
            'booking_number'=>'fwfpnwefi'
        ]);

        $booking->update(['booking_number' => '#FAKTURA000'.$booking->id ]);

        $zal_spot = null;

        if($booking){

            if($booking->seans->hall == '3d1'){

                $zal_spot = '1-nji zal 3D';

        } else {

                $zal_spot = '2-nji zal 3D';

            }
            
            return response()->json([
                'msg'=>'booking created successfully',
                'booking'=>$booking,
                'seans'=>$booking->seans,
                'spot'=> $booking->spot,
                'zal_spot'=>$zal_spot.' , '.$booking->spot->number,
                'seans_time'=>date('d/m/Y H:i', strtotime($booking->seans->start_date))
            ]);
            
        } else {
            return response()->json([
                'msg'=>'error occured'
            ]);
        }
    }

   
    public function show(Booking $booking)
    {
        //
    }

  
    public function edit(Booking $booking)
    {
        //
    }

   
    public function update(Request $request, Booking $booking)
    {

    }

  
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success','bilet pozuldy');
    }
}
