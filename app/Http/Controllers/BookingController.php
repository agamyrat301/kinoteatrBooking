<?php

namespace App\Http\Controllers;
use App\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $keyword = null;
        $seans_start_date = null;

        if ($request->has('seans_start_date')) {
            $seans_start_date = $request->get('seans_start_date');
        }

        if ($request->has('search_query')) {
            $keyword = strtolower($request->get('search_query'));
        }
        
        if($request->ajax())
        {
            // $data = Booking::orderBy('created_at','desc');
            $data = Booking::when($keyword, function ($query, $keyword) {
                return $query->where(
                    function ($q) use ($keyword) {
                    return $q->where('booking_number', 'LIKE', "%$keyword%");
                });

            })->when($seans_start_date, function ($query, $seans_start_date) {
               // $seans_start_date = Carbon::createFromFormat('m-d-Y', $seans_start_date)->format('Y-m-d');
                if (strlen($seans_start_date) == 10) {
                    return $query->whereDate('created_at', $seans_start_date);
                } else {
                    $from = substr($seans_start_date, 0, 10);
                    $to = substr($seans_start_date, 13, 24);
                    return $query->whereBetween('created_at', [$from, $to]);
                    
                }
            })->orderBy('created_at', 'DESC');
    
            return DataTables::of($data)

            ->editColumn('seans_id', function ($booking) {
                return  $booking->seans->seans_number;
            })
            ->editColumn('spot_id', function ($booking) {
                return  $booking->spot->number;
            })
            ->editColumn('created_at', function ($booking) {

                return date('d/m/Y H:i', strtotime($booking->created_at));

            })->addColumn('action', function ($booking) {

            return view('column_for_bookings', compact('booking'));

            })->addIndexColumn()->rawColumns(['action'])->make();
        }
        return view('admin.bookings.index');
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

        $booking->update(['booking_number'=>'#FAKTURA000'.$booking->id]);

        if($booking){
            return response()->json([
                'msg'=>'booking created successfully',
                'booking'=>$booking,
                'seans'=>$booking->seans,
                'spot'=> $booking->spot
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
