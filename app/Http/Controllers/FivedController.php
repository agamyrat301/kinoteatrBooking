<?php

namespace App\Http\Controllers;

use App\Fived;
use App\Spot;
use App\Booking;
use Illuminate\Http\Request;

class FivedController extends Controller
{
    public function index()
    {
        $Aspots = Spot::whereZal('5d')->where('number','LIKE','%A%')->get();
        $Bspots = Spot::whereZal('5d')->where('number','LIKE','%B%')->get();
        $Bspots = Spot::whereZal('5d')->where('number','LIKE','%B%')->get();
        $Cspots = Spot::whereZal('5d')->where('number','LIKE','%C%')->get();
        $Dspots = Spot::whereZal('5d')->where('number','LIKE','%D%')->get();
        $booking_ids = Booking::where('seans_id', 3)->pluck('spot_id')->toArray();
        return view('admin.fiveds.index',compact('seanse','Aspots','Bspots','Cspots','Dspots','booking_ids'));
    }

    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {

       // return  Spot::find($request->get('spot_id'));

        $fived = Fived::create([
            'price'=>$request->get('price'),
            'spot_id'=>$request->get('spot_id')
        ]);

        $spot = Spot::find($request->get('spot_id'));

        Spot::whereId($request->get('spot_id'))->update(['status'=>false]);

        return response()->json([
            'success'=> true,
            'fived'=> $fived,
            'spot'=>$spot
        ]);
    }

 
    public function show(Fived $fived)
    {
        //
    }
 
    public function edit(Fived $fived)
    {
        //
    }
 
    public function update(Request $request, Fived $fived)
    {
        //
    }
 
    public function destroy(Fived $fived)
    {
        //
    }

    public function fived_reports(Request $request)
    {
        $seans_start_date = null;
        if($request->has('seans_start_date')){
            $seans_start_date = $request->get('seans_start_date');
        }

        $fiveds = Fived::when($seans_start_date, function ($query, $seans_start_date) {

            // $seans_start_date = Carbon::createFromFormat('m-d-Y', $seans_start_date)->format('Y-m-d');
             if (strlen($seans_start_date) == 10) {

                 return $query->whereDate('created_at', $seans_start_date);

             } else {
                 $from = substr($seans_start_date, 0, 10);
                 $to = substr($seans_start_date, 13, 24);
                 return $query->whereBetween('created_at', [$from, $to]);
             }

         })->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.reports.fived_reports')->with('fiveds', $fiveds)->with('seans_start_date', $seans_start_date);
    }

    public function empty(Request $request)
    {
        $fived_spots = Spot::whereZal('5d')->get();
        foreach ($fived_spots as $spot) {
            $spot->update([
                'status'=>true
            ]);
        }
        return redirect()->route('fiveds.index')->with('success','5D zaldaky hemme orunlar boshadyldy');
    }
}
